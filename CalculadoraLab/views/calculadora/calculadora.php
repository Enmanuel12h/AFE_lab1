<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Calculadora Yii2';
?>

<div class="calculadora">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title text-center"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="card-body">
                    <?php if ($mensajeError): ?>
                        <div class="alert alert-danger">
                            <?= Html::encode($mensajeError) ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($resultado !== null): ?>
                        <div class="alert alert-success">
                            <h4 class="text-center">Resultado: <?= Html::encode($resultado) ?></h4>
                        </div>
                    <?php endif; ?>
                    
                    <form method="post" action="">
                        <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>
                        
                        <div class="form-group mb-3">
                            <label for="numero1" class="form-label">Primer número:</label>
                            <input type="text" class="form-control" id="numero1" name="numero1" value="<?= Html::encode($numero1) ?>" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="operador" class="form-label">Operación:</label>
                            <select class="form-select" id="operador" name="operador" required>
                                <option value="suma" <?= $operador === 'suma' ? 'selected' : '' ?>>Suma (+)</option>
                                <option value="resta" <?= $operador === 'resta' ? 'selected' : '' ?>>Resta (-)</option>
                                <option value="multiplicacion" <?= $operador === 'multiplicacion' ? 'selected' : '' ?>>Multiplicación (×)</option>
                                <option value="division" <?= $operador === 'division' ? 'selected' : '' ?>>División (÷)</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="numero2" class="form-label">Segundo número:</label>
                            <input type="text" class="form-control" id="numero2" name="numero2" value="<?= Html::encode($numero2) ?>" required>
                        </div>
                        
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Calcular</button>
                            <button type="button" class="btn btn-secondary btn-lg ms-2" onclick="window.location.href=window.location.href;">Limpiar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
