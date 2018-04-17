<?php
    $this->title = "Управление марками"
?>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <button class="btn btn-primary toggle-brand-modal">Добавить марку</button>
            <table class="table table-hover brands-table">
                <tr>
                    <th>ID</th>
                    <th>Марка</th>
                    <th>Действие</th>
                </tr>
                <?php foreach($brands as $brand): ?>
                <tr data-id="<?=$brand->id?>">
                    <td><?= $brand->id?></td>
                    <td><?= $brand->name?></td>
                    <td><button class="btn btn-danger delete-brand">Удалить</button></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="add-brand-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Добавление марки</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="new-brand-name">Имя новой марки</label>
            <input type="text" id="new-brand-name" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
        <button type="button" class="btn btn-primary submit-new-brand">Создать</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->