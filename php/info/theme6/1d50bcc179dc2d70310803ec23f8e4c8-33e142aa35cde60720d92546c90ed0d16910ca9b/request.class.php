<?php

class Request
{
    private $errors = [];

    /**
     * проверяет метод получения данных POST
     * @return bool
     */
    public function isPost()
    {
       return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    /**
     * очищает входную строку от концевых пробелов и тегов
     * @param $str входная строка
     * @return string обработанная строка
     */
    public function clear($str)
    {
        return strip_tags( trim($str) );
    }

    /**
     * проверка поля на существование и повзвращение его значения
     * @param $inputName название поля
     * @return string значение поля
     */
    public function getField($inputName)
    {
        $value = $_POST[$inputName] ?? '';

        return $this->clear($value);
    }

    /**
     * проверка поля на заполнение
     * @param $inputName название проверяемого поля
     */
    public function required($inputName)
    {
        $value = $this->getField($inputName);
        if(empty($value))
        {
            $this->errors[$inputName][] = 'поле обязательно к заполнению';
        }
    }

    /**
     * получение ошибок
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * проверяет длину строки из поля на минимальное значения
     * @param $inputName название поля
     * @param $min минмиальное значение
     */
    public function min($inputName, $min)
    {
        //todo
    }


    /**
     * проверяет длину строки из поля на максимальное значения
     * @param $inputName название поля
     * @param $max максимальное значение
     */
    public function max($inputName, $max)
    {
        //todo
    }

    /**
     * проверка значения на максимальность
     * метод проверяет является ли введенное значение email
     * @param $inputName - имя поля
     */
    public function isEmail($inputName)
    {
        //todo
    }

    /**
     * проверка значения на максимальность
     * @param $inputName нвазание проверяемого поля
     * @param $minValue максимальное значение
     */
    public function maxValue($inputName, $maxValue)
    {
        //todo
    }

    /**
     * проверка значения на минимальность
     * @param $inputName
     * @param $minValue
     */
    public function minValue($inputName, $minValue)
    {
        //todo
    }


    
}
?>