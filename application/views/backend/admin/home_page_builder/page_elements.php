<!-- Here must have the draggable class in the each elements -->

<h5 class="mb-3 pb-2 border-bottom text-14px">Buttons:</h5>
<div class="d-flex gap-2 align-items-center flex-wrap justify-content-between">
    <a href="#" class="draggable cursor-move py-2">Link</a>
    <a href="#" class="draggable cursor-move purchase-btn">Gradient</a>

    <a href="#" class="draggable cursor-move btn btn-primary">Primary</a>
    <a href="#" class="draggable cursor-move btn btn-dark">Dark</a>
    <a href="#" class="draggable cursor-move btn btn-light">Light</a>
    <a href="#" class="draggable cursor-move btn btn-success">Success</a>
    <a href="#" class="draggable cursor-move btn btn-info">Info</a>
    <a href="#" class="draggable cursor-move btn btn-warning">Warning</a>
    <a href="#" class="draggable cursor-move btn btn-danger">Danger</a>
</div>

<script>
    initialize_draggable('clone');
</script>