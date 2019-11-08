"use strict";

document.addEventListener('DOMContentLoaded', (event) => {
    const addTodo = document.getElementById("addTodo");
    const addTodoMobile = document.getElementById("addTodoMobile");

    const addModal = document.getElementById("addTaskModal");
    const addModalClose = document.getElementById("addTaskModal-close");
    const addModalBackground = document.getElementById("addTaskModal-background");
    const addModalCancel = document.getElementById("addTaskModal-cancel");

    const tasksList = document.getElementsByClassName("todo");

    const editModal = document.getElementById("editModal");
    const editModalBackground = document.getElementById("editModal-background");
    const editModalClose = document.getElementById("editModal-close");
    const editModalForm = document.getElementById("editModal-form")
    const editModalTaskTitle = document.getElementById("editModal-title-input");
    const editModalTaskDescription = document.getElementById("editModal-description-input");
    const editModalStatus = document.getElementById("editModal-status");
    const editModalDeleteTask = document.getElementById("editModal-deleteTask");
    const editModalCancel = document.getElementById("editModal-cancelTask");

    const alertModal = document.getElementById("alertModal");
    const alertModalDeleteTask = document.getElementById("alertModal-deleteTask");
    const alertModalCancel = document.getElementById("alertModal-cancelTask");

    function createModal(id) {
        const title = document.getElementById(`title-${id}`).innerHTML;
        const description = document.getElementById(`description-${id}`).innerHTML;
        const status = document.getElementById(`status-${id}`).innerHTML
        const priority = document.getElementById(`priority-${id}`).innerHTML

        editModalForm.action = `controllers/edit-task.php?id=${id}`;
        editModalTaskTitle.value = title;
        editModalTaskDescription.value = description;

        editModalDeleteTask.addEventListener("click", function () {
            alertModal.classList.add("is-active");
            alertModalDeleteTask.href = `controllers/delete-task.php?id=${id}`;
            alertModalCancel.addEventListener("click", function () {
                alertModal.classList.remove("is-active");
            });
        });

        switch (status) {
            case "todo":
                editModalStatus.selectedIndex = 0;
                break;
            case "inprogress":
                editModalStatus.selectedIndex = 1;
                break;
            case "done":
                editModalStatus.selectedIndex = 2;
                break
        }

        switch (priority) {
            case "low":
                editModalForm.taskPriority[0].checked = true;
                break;
            case "medium":
                editModalForm.taskPriority[1].checked = true;
                break;
            case "high":
                editModalForm.taskPriority[2].checked = true;

        }

        editModal.classList.add("is-active");
    }

    Array.from(tasksList).forEach((task) => {
        let editTask = document.getElementById(task.id);

        editTask.addEventListener("click", function () {
            createModal(task.id.substr(5));
        });
    });

    addTodo.onclick = () => {
        addModal.classList.add("is-active");
    }

    addTodoMobile.onclick = () => {
        addModal.classList.add("is-active");
    }

    addModalBackground.onclick = () => {
        addModal.classList.remove("is-active");
    }

    addModalClose.onclick = () => {
        addModal.classList.remove("is-active");
    }

    addModalCancel.onclick = () => {
        addModal.classList.remove("is-active");
    }

    editModalBackground.onclick = () => {
        editModal.classList.remove("is-active");
    }


    editModalClose.onclick = () => {
        editModal.classList.remove("is-active");
    }

    editModalCancel.onclick = () => {
        editModal.classList.remove("is-active");
    }
})