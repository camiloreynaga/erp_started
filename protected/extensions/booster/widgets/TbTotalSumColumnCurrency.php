<?php
Yii::import('booster.widgets.TbTotalSumColumn');

class TbTotalSumColumnCurrency extends TbTotalSumColumn
{
    protected function renderFooterCellContent()
    {
        if(is_null($this->total))
            return parent::renderFooterCellContent();

        echo $this->totalValue? $this->evaluateExpression($this->totalValue, array('total'=>number_format($this->total), 2, '.', '')) : $this->grid->getFormatter()->format(number_format($this->total, 2, '.', ''), $this->type);
    }
}
?>
