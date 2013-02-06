<?php

if((string)Mage::getConfig()->getModuleConfig('Loewenstark_Head')->active == 'true')
{
    class Loewenstark_Scripts_Block_Abstract
    extends Loewenstark_Head_Block_Page_Html_Head {}
} else {
    class Loewenstark_Scripts_Block_Abstract
    extends Mage_Page_Block_Html_Head {}
}
