<div class="container">
    <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
            <div class="form-group field-models-brand_id">
                <label class="control-label" for="models-brand_id">Марка</label>
                <select id="models-list-brand_id" class="form-control" name="">
                <?php foreach($brands as $brand): ?>
                    <option value="<?= $brand->id?>" selected=""><?=$brand->name?></option>
                <?php endforeach; ?>
                </select>
            </div>
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