<?php
    $this->title = "Управление моделями"
?>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <div class="row">
                <div class="form-group field-models-brand_id">
                <label class="control-label" for="models-brand_id">Марка</label>
                <select id="models-list-brand_id" class="form-control" name="">
                <?php foreach($brands as $brand): ?>
                    <option value="<?= $brand->id?>" selected=""><?=$brand->name?></option>
                <?php endforeach; ?>
                </select>
                <br>
                <button class="btn btn-primary toggle-model-modal">Добавить марку</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">       
            <table class="table table-hover models-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Модель</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>  
        </div>      
    </div>        
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="add-model-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Добавление модели</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="new-brand-name">Имя новой модели</label>
            <input type="text" id="new-model-name" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
        <button type="button" class="btn btn-primary submit-new-model">Создать</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->