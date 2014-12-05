<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" >
    <xsl:template match="/">
        <html>
            <head>
                <title>My Cookbook</title>
                <style type="text/css">
                    h1 { font-style: italic ; color: green }
                    td.prep { font-style: italic ; bgcolor: orange ; colspan: 2}

                    table {
                    border-collapse: collapse;
                    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                    width: 100%;
                    }

                    table td, table th {
                    font-size: 1em;
                    border: 1px solid #98bf21;
                    padding: 3px 7px 2px 7px;
                    }

                    table th {
                    font-size: 1.1em;
                    text-align: left;
                    padding-top: 5px;
                    padding-bottom: 4px;
                    background-color: #A7C942;
                    color: #ffffff;
                    }

                    table tr:nth-child(odd) td
                    {
                    color:#000000;
                    background-color:#EAF2D3;
                    }

                    ol {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                    }

                    li {
                    font: 200 20px/1.5 Helvetica, Verdana, sans-serif;
                    border-bottom: 1px solid #ccc;
                    }

                    li:last-child {
                    border: none;
                    }

                    li a {
                    text-decoration: none;
                    color: #000;
                    display: block;
                    width: 200px;

                    -webkit-transition-: font-size 0.3s ease, background-color 0.3s ease;
                    -moz-transition: font-size 0.3s ease, background-color 0.3s ease;
                    -o-transition: font-size 0.3s ease, background-color 0.3s ease;
                    -ms-transition: font-size 0.3s ease, background-color 0.3s ease;
                    transition: font-size 0.3s ease, background-color 0.3s ease;
                    }

                    li a:hover {
                    font-size: 30px;
                    background: #f6f6f6;
                    }
                </style>
            </head>
            <body>
                <h1>My Recipe Collection</h1>
                <table>
                    <xsl:for-each select="cookbook/recipe">
                        <tr>
                            <th colspan="2">
                                <xsl:value-of select="name"/>
                            </th>
                        </tr>
                        <xsl:for-each select="ingredient">
                            <tr>
                                <td>
                                    <xsl:value-of select="name"/>
                                </td>
                                <td>
                                    <xsl:value-of select="amount"/><xsl:value-of select="unit"/>
                                </td>
                            </tr>
                        </xsl:for-each>
                        <tr>
                            <td bgcolor="lightyellow" colspan="2">
                                <ol>
                                    <xsl:for-each select="cooking/step">
                                        <li>
                                            <xsl:value-of select="current()"/>
                                        </li>
                                    </xsl:for-each>
                                </ol>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <ul>
                                    <xsl:for-each select="tips/tip">
                                        <li>
                                            <xsl:value-of select="current()"/>
                                        </li>
                                    </xsl:for-each>
                                </ul>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>