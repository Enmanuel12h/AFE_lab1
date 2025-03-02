<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class CalculadoraController extends Controller
{
    public function actionCalculadora()
    {
        $resultado = null;
        $numero1 = null;
        $numero2 = null;
        $operador = null;
        $mensajeError = null;
        
        if (Yii::$app->request->isPost) {
            $numero1 = Yii::$app->request->post('numero1');
            $numero2 = Yii::$app->request->post('numero2');
            $operador = Yii::$app->request->post('operador');
            
            if (!is_numeric($numero1) || !is_numeric($numero2)) {
                $mensajeError = 'Ambos valores deben ser números';
            } else {
                switch ($operador) {
                    case 'suma': $resultado = $numero1 + $numero2; break;
                    case 'resta': $resultado = $numero1 - $numero2; break;
                    case 'multiplicacion': $resultado = $numero1 * $numero2; break;
                    case 'division':
                        if ($numero2 == 0) {
                            $mensajeError = 'No es posible dividir por cero';
                        } else {
                            $resultado = $numero1 / $numero2;
                        }
                        break;
                }
            }
        }
        
        return $this->render('calculadora', [
            'resultado' => $resultado,
            'numero1' => $numero1,
            'numero2' => $numero2,
            'operador' => $operador,
            'mensajeError' => $mensajeError
        ]);
    }
}
