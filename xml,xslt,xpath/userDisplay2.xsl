<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
  version="1.0">
  <xsl:output method="html"/>

  <xsl:template match="/">
    <html>
      <head><title>Transform</title></head>
      <body>
        <h1>Number of Users</h1>
        <p>
          I have <xsl:value-of select="count(//user)"/> Users
        </p>        
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>