<?php
    $this->title = "Управление опциями"
?>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <button class="btn btn-primary toggle-option-modal">Добавить опцию</button>
            <table class="table table-hover options-table">
                <tr>
                    <th>ID</th>
                    <th>Опция</th>
                    <th>Действие</th>
                </tr>
                <?php foreach($options as $option): ?>
                <tr data-id="<?=$option->id?>">
                    <td><?= $option->id?></td>
                    <td><?= $option->name?></td>
                    <td><button class="btn btn-danger delete-option">Удалить</button></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="add-option-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Добавление Опции</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="new-option-name">Имя новой Опции</label>
            <input type="text" id="new-option-name" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
        <button type="button" class="btn btn-primary submit-new-option">Создать</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->