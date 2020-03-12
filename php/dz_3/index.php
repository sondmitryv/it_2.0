<?php

class DateFunctionsClass{
    function __construct($date1,$date2)
    {
        $this->setDate1($date1);
        $this->setDate2($date2);
    }
	
	private $date1 = '';
	private $date2 = '';
	
	/**
     * установка первой даты
     */
	public function setDate1($date1)
	{
         $this->date1=trim($date1);
	}

    /**
     * установка второй даты
     */
	public function setDate2($date2)
	{
         $this->date2=trim($date2);
	}

    /**
     * дата в формате '2020-02-02' преобразовуется в timestamp
     * @param $date
     * @return int
     */
    public function getDateInTimestamp($date = ''):int
    {
        $date=(empty($date1))?$this->date1:trim($date);
        $date=strtotime($date);
        return $date;
    }

    /**
     * получение разницы двух дат
     * @param $date1
     * @param $date2
     * @return int
     */
	public function getDifferentDate($date1 = '', $date2 = ''):int
	{
            $date1=(empty($date1))?$this->date1: trim($date1);
            $date2=(empty($date2))? $this->date2: trim($date2);
            $date1=strtotime($date1);
            $date2=strtotime($date2);
            $diference=abs($date1-$date2);
            return $diference/86400;
	}
    /**
     * определение является ли дата рабочим днем
     * @param $date
     * @return bool
     */
	public function isWorkDate($date = ''):bool
    {   
        $date=(empty($date))?$this->date1:trim($date);
        $timeStampDate=strtotime($date);
        $index_day=Date('w',$timeStampDate);
        if($index_day>0&&$index_day<6)
        {
            return true;
        }

        return false;
    }

    /**
     * функция возвращает словами день недели
     * @param string $date
     * @return string
     */
    public function getNameDayOfWeek($date = ''): string
    {
        $date=(empty($date))?$this->date1:trim($date);
        $days=["Воскресенье","Пондельник","Вторник","Среда","Четверг","Пятница","Суббота"];
        $timeStampDate=strtotime($date);
        $index_day=Date('w',$timeStampDate);
        return $days[$index_day];
    }

}
$dateFunctionObj=new DateFunctionsClass('2019-02-03','2019-02-04');
echo ($dateFunctionObj->getDateInTimestamp()."<br>");
echo($dateFunctionObj->getDifferentDate('2020-02-10','2020-02-11')."дня(дней)"."<br>");
echo($dateFunctionObj->getNameDayOfWeek('2020-03-05')."<br>");
echo ($dateFunctionObj->isWorkDate('2020-03-05'))?"Не выходной":"Выходной"."<br>";
?>