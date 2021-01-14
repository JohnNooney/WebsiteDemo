<?xml version="1.0" encoding="utf-8"?> 
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0" >
<xsl:output method="xml" version="1.0" omit-xml-declaration="yes" indent="yes" media-type="text/html"/>
    
<xsl:template match="/">
    <xsl:element name="p">
    	<xsl:text>Location:  </xsl:text>
    	<xsl:value-of select="weatherdata/location/name" />
        <xsl:text>, </xsl:text>
        <xsl:value-of select="weatherdata/location/country" />
        <xsl:element name="br" />
    </xsl:element>
    <xsl:element name="p">
    	<xsl:text>Current Temp:  </xsl:text>
    	<xsl:value-of select="weatherdata/forecast/tabular/time[1]/temperature/@value" />
        <xsl:text>° </xsl:text>
        <xsl:value-of select="weatherdata/forecast/tabular/time[1]/temperature/@unit" />
        <xsl:element name="br" />
    </xsl:element>
	<xsl:element name="p">
    	<xsl:text>Credit:  </xsl:text>
    	<xsl:value-of select="weatherdata/credit/link/@text" />
    </xsl:element> 
	<!--<xsl:apply-templates select="/contacts/contact[@id='c5103333']/emails/email[@type='work']" /> -->
</xsl:template>

<!-- <xsl:template match="email">
	<xsl:element name="p">
		<xsl:value-of select="." />
	</xsl:element>
</xsl:template> -->

</xsl:stylesheet>