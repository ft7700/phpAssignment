<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
  version="1.0">
  <xsl:output method="html"/>

  <xsl:template match="/">
    <html>
      <head><title>Transform</title></head>
      <body>
        <h1>Users</h1>
        
        <xsl:for-each select="//user">
          <h2><xsl:value-of select="title"/></h2>
          <p>
            Age: <xsl:value-of select="@age"/>
            <br/>
            Username: <xsl:value-of select="username"/>
          </p>
        </xsl:for-each>
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>
