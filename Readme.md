# Magento JS in Footer

layout.xml sample:

    <block type="loe_scripts/Script" name="footer.js.items" template="page/html/footer_js.phtml">
        <block type="page/html" name="footer.js.otherstuff" template="local/js_footer.phtml" />
        <action method="addItem"><type>skin_js</type><link>js/functions.js</link></action>
        <action method="addItem"><type>skin_js</type><link>js/local.js</link></action>
        <action method="addExternalJs"><js><![CDATA[https://apis.google.com/js/plusone.js]]></js></action>
    </block>
    
Template Sample:

    <?php echo $this->getJsHtml() ?>
    <?php echo $this->getChildHtml() ?>
    <?php echo $this->getExternalJsHtml() ?>