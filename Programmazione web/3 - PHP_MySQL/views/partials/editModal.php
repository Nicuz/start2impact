<div id="editModal" class="modal">
    <div id="editModal-background" class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head is-borderless">
            <p class="modal-card-title">Edit task</p>
            <button id="editModal-close" class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <form id="editModal-form" method="POST">
                <div class="field">
                    <label class="label"><i class="fas fa-tasks"></i>&nbsp;&nbsp;Title</label>
                    <div class="control">
                        <input id="editModal-title-input" name="taskTitle" class="input" type="text"
                            placeholder="Task title" required pattern=".*\S+.*"
                            title="This field can't be empty and must start with an alphanumeric value.">
                    </div>
                </div>

                <div class=" field">
                    <label class="label"><i class="fas fa-align-left"></i>&nbsp;&nbsp;Description</label>
                    <div class="control">
                        <textarea id="editModal-description-input" name="taskDescription" class="textarea"
                            placeholder="Task description (optional)"></textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label"><i class="fas fa-question-circle"></i>&nbsp;&nbsp;Status</label>
                    <div class="control">
                        <div class="select">
                            <select id="editModal-status" name="taskStatus">
                                <option>To do</option>
                                <option>In progress</option>
                                <option>Done</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label"><i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;Priority</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="taskPriority" value="low" required>
                            <div class="tag is-primary">Low</div>
                        </label>
                        <label class="radio">
                            <input type="radio" name="taskPriority" value="medium">
                            <div class="tag is-warning">Medium</div>
                        </label>
                        <label class="radio">
                            <input type="radio" name="taskPriority" value="high">
                            <div class="tag is-danger">High</div>
                        </label>
                    </div>
                </div>
        </section>
        <footer class="modal-card-foot is-borderless">
            <button class="button is-link is-rounded"><i class="fas fa-sync-alt"></i>&nbsp;&nbsp;Update
                task</button> </form>
            </form>
            <a id="editModal-deleteTask"><button class="button is-danger is-outlined is-rounded"><i
                        class="fas fa-trash"></i>&nbsp;&nbsp;Delete
                    task</button></a>
            <button id="editModal-cancelTask" class="button is-borderless has-transparent-background">Cancel</button>
        </footer>
    </div>
</div>