"use strict";

document.addEventListener('DOMContentLoaded', (event) => {
    const searchBar = document.getElementById("searchbar");
    const searchBtn = document.getElementById("searchbtn");
    const locationBtn = document.getElementById("locationbtn");

    const progressBar = document.getElementById("progress");
    const searchResultsNumber = document.getElementById("searchResultsNumber");
    const searchResults = document.getElementById("searchresults");

    const locationTag = document.getElementById("locationTag");
    const weatherContainer = document.getElementById("weatherContainer");
    const cityName = document.getElementById("cityName");

    searchBar.onkeydown = (event) => {
        if (event.keyCode === 13 && searchBar.value.length > 0) {
            getCityList(searchBar.value);
        }
    };
    searchBtn.onclick = () => {
        if (searchBar.value.length > 0) {
            getCityList(searchBar.value);
        }
    }

    locationBtn.onclick = () => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                getWeather(undefined, position.coords.latitude, position.coords.longitude);
            });
        }
    }

    async function getWeather(id, latitude, longitude) {
        const appid = "INSERT YOUR APPID HERE";
        let url = "http://api.openweathermap.org/data/2.5/forecast?";

        if (latitude != undefined && longitude != undefined) {
            url += `lat=${latitude}&lon=${longitude}&units=metric&appid=${appid}`
        } else {
            url += `id=${id}&units=metric&appid=${appid}`
        }

        searchResultsNumber.classList.add("is-hidden");
        searchResults.classList.add("is-hidden");
        let response = await fetch(url);
        let data = await response.json();

        locationTag.href = `https://www.google.com/maps/search/${data.city.name}, ${data.city.country}`;
        cityName.innerHTML = `${data.city.name}, ${data.city.country}`;

        for (let i = 0; i < 3; i++) {
            let timestamp = document.getElementById(`timestamp${i}`);
            let currentTemperature = document.getElementById(`currentTemperature${i}`);
            let currentConditions = document.getElementById(`currentConditions${i}`);
            let currentHumidity = document.getElementById(`currentHumidity${i}`);
            let tempMin = document.getElementById(`tempMin${i}`);
            let tempMax = document.getElementById(`tempMax${i}`);
            let currentIcon = document.getElementById(`currentIcon${i}`);

            let weather = {
                date: data.list[i].dt_txt,
                currentTemperature: Math.round(data.list[i].main.temp * 10) / 10,
                currentConditions: data.list[i].weather[0].main,
                currentHumidity: data.list[i].main.humidity,
                tempMin: Math.round(data.list[i].main.temp_min * 10) / 10,
                tempMax: Math.round(data.list[i].main.temp_max * 10) / 10,
                currentIcon: `assets/weather/${data.list[i].weather[0].icon}.svg`
            };

            timestamp.innerHTML = `${weather.date.substring(0, weather.date.length - 3)}`;
            currentTemperature.innerHTML = weather.currentTemperature;
            currentConditions.innerHTML = weather.currentConditions;
            currentHumidity.innerHTML = weather.currentHumidity;
            tempMin.innerHTML = weather.tempMin;
            tempMax.innerHTML = weather.tempMax;
            currentIcon.src = weather.currentIcon;
        }

        weatherContainer.classList.remove("is-hidden");
    }

    async function getFlag(countryCode) {
        const url = `https://restcountries.eu/rest/v2/alpha/${countryCode}`;
        let response = await fetch(url);
        let data = await response.json();
        return data.flag;
    }

    async function getCityList(city) {
        const appid = "INSERT YOUR APPID HERE";
        const url = `http://api.openweathermap.org/data/2.5/find?q=${city}&units=metric&appid=${appid}`;

        searchResults.innerHTML = "";
        progressBar.classList.remove("is-hidden");

        let response = await fetch(url);
        let data = await response.json()

        for (let i = 0; i < data.list.length; i++) {
            let flagURL = await getFlag(data.list[i].sys.country);
            let searchResultItem = {
                id: data.list[i].id,
                name: data.list[i].name,
                country: data.list[i].sys.country,
                flag: flagURL
            }
            searchResults.innerHTML += `<article class="media">
            <figure class="media-left">
                <p class="image" style="width: 32px;">
                    <img src="${searchResultItem.flag}">
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <span id="${searchResultItem.id}" class="city"><b>${searchResultItem.name}</b>, <small>${searchResultItem.country}</small></span>
                        </span>
                    </p>
                </div>
            </div>
        </article>`;
        }

        for (let i = 0; i < data.list.length; i++) {
            let getChild = document.getElementById(data.list[i].id);

            getChild.addEventListener("click", function () {
                getWeather(data.list[i].id);
            });
        }

        searchResultsNumber.innerHTML = data.list.length == 1 ? `1 result found` : `${data.list.length} results found`;
        searchBar.value = "";
        progressBar.classList.add("is-hidden");
        searchResults.classList.remove("is-hidden");
        searchResultsNumber.classList.remove("is-hidden");
    }
})