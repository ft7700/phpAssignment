<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
  version="1.0">
  <xsl:output method="html"/>

  <xsl:template match="/">
    <html>
      <head><title>Transform</title></head>
      <body>
        <h1>User Collection</h1>
        
        <table border="1">
          <tr><th>ID</th><th>Username</th><th>Email</th></tr>
          
          <xsl:for-each select="profile/user">
            <tr>
              <td><xsl:value-of select="id" /></td>
              <td><xsl:value-of select="username" /></td>
              <td><xsl:value-of select="email" /></td>
            </tr>
          </xsl:for-each>
        </table>       
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>