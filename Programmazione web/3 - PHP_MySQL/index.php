<?php include 'views/partials/header.php'; ?>
<?php include 'views/partials/navbar.php'; ?>

<?php require 'controllers/index.php'; ?>

<?php include 'views/partials/addModal.php'; ?>
<?php include 'views/partials/editModal.php'; ?>
<?php include 'views/partials/alertModal.php'; ?>

<div id="addTaskMobile" class="section is-hidden-desktop">
    <div class="container has-text-centered">
        <a id="addTodoMobile" class="button is-link is-rounded">
            <strong><i class="fas fa-plus"></i>&nbsp;&nbsp;Add task</strong>
        </a></div>
</div>

<section class="section is-primary">
    <div class="container">
        <div class="columns">
            <div class="column">
                <h1 class="heading">To do</h1>
                <div class="box">
                    <?php if (count($todoTasks) > 0): ?>
                    <?php foreach ($todoTasks as $task) : ?>
                    <article id="todo-<?= $task->getID() ?>"
                        class="todo box media is-borderless is-shadowless">
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <strong
                                        id="title-<?= $task->getID(); ?>"><?= $task->getTitle(); ?></strong>
                                    <br>
                                    <span
                                        id="description-<?= $task->getID(); ?>"
                                        class="has-text-grey"><?= $task->getDescription(); ?></span>
                                    <span
                                        id="status-<?= $task->getID(); ?>"
                                        class="is-hidden"><?= $task->getStatus(); ?></span>
                                    <span
                                        id="priority-<?= $task->getID(); ?>"
                                        class="is-hidden"><?= $task->getPriority(); ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="media-right is-vcentered">
                            <i
                                class="fas fa-circle has-priority-<?= $task->getPriority() ?>"></i>
                        </div>
                    </article>
                    <?php endforeach; ?>
                    <?php else :?>
                    <?php include 'views/partials/hero-no-items.php' ?>
                    <?php endif;?>
                </div>
            </div>
            <div class="column">
                <h1 class="heading">In progress</h1>
                <div class="box">
                    <?php if (count($doingTasks) > 0): ?>
                    <?php foreach ($doingTasks as $task) : ?>
                    <article id="todo-<?= $task->getID() ?>"
                        class="todo box media is-borderless is-shadowless">
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <strong
                                        id="title-<?= $task->getID(); ?>"><?= $task->getTitle(); ?></strong>
                                    <br>
                                    <span
                                        id="description-<?= $task->getID(); ?>"
                                        class="has-text-grey"><?= $task->getDescription(); ?></span>
                                    <span
                                        id="status-<?= $task->getID(); ?>"
                                        class="is-hidden"><?= $task->getStatus(); ?></span>
                                    <span
                                        id="priority-<?= $task->getID(); ?>"
                                        class="is-hidden"><?= $task->getPriority(); ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="media-right is-vcentered">
                            <i
                                class="fas fa-circle has-priority-<?= $task->getPriority() ?>"></i>
                        </div>
                    </article>
                    <?php endforeach; ?>
                    <?php else :?>
                    <?php include 'views/partials/hero-no-items.php' ?>
                    <?php endif;?>
                </div>
            </div>
            <div class="column">
                <h1 class="heading">Done</h1>
                <div class="box">
                    <?php if (count($doneTasks) > 0): ?>
                    <?php foreach ($doneTasks as $task) : ?>
                    <article id="todo-<?= $task->getID(); ?>"
                        class="todo box media is-borderless is-shadowless">
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <strong
                                        id="title-<?= $task->getID(); ?>"><?= $task->getTitle(); ?></strong>
                                    <br>
                                    <span
                                        id="description-<?= $task->getID(); ?>"
                                        class="has-text-grey"><?= $task->getDescription(); ?></span>
                                    <span
                                        id="status-<?= $task->getID(); ?>"
                                        class="is-hidden"><?= $task->getStatus(); ?></span>
                                    <span
                                        id="priority-<?= $task->getID(); ?>"
                                        class="is-hidden"><?= $task->getPriority(); ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="media-right is-vcentered">
                            <i
                                class="fas fa-circle has-priority-<?= $task->getPriority() ?>"></i>
                        </div>
                    </article>
                    <?php endforeach; ?>
                    <?php else :?>
                    <?php include 'views/partials/hero-no-items.php' ?>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'views/partials/footer.php';
