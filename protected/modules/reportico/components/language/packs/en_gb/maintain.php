<?php
/*
 Reportico - PHP Reporting Tool
 Copyright (C) 2010-2013 Peter Deed

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

 * File:        maintain.php
 *
 * This is the core Reportico Reporting Engine. The main 
 * reportico class is responsible for coordinating
 * all the other functionality in reading, preparing and
 * executing Reportico reports as well as all the screen
 * handling.
 *
 * @link http://www.reportico.co.uk/
 * @copyright 2010-2013 Peter Deed
 * @author Peter Deed <info@reportico.org>
 * @package Reportico
 * @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @version : reportico.php,v 1.58 2013/04/24 22:03:22 peter Exp $
 */
$locale_arr = array (
    "language" => "English",
    "template" => array (
        // Maintenance Buttons
        "T_OK" => "Ok",
        "T_ADD" => "Add",

        // Maintenance Tabs
        "T_PROJECT_MENU" => "Project Menu",
        "T_ADMIN_MENU" => "Admin Menu",
        "T_RUN_REPORT" => "Run Report",
        "T_DELETE_REPORT" => "Delete Report",
        "T_INFORMATION" => "Information",
        "T_GEN_WEB_SERVICE" => "Generate Web Service",
        "T_DESIGN_PASSWORD_PROMPT" => "Password for Design Mode",
        "T_LOGIN" => "Log In",
        "T_LOGOFF" => "Log Off",
        "T_CUSTOMSOURCECODE" => "Custom Source Code",
        "T_SAFEOFF" => "(Turn off Safe<br>Design Mode in<br>project configuration to <br>enable this feature)",
        "T_GO" => "Go",
        "T_PROJECT" => "Project:",
        "T_SAVE" => "Save",
        "T_REPORT_FILE" => "Report File",
        "T_NEW_REPORT" => "New Report",
        "T_ENTER_PROJECT_PASSWORD" => "Enter the project password.",
        "T_QUERY_DETAILS" => "Query Details",
        "T_OUTPUT" => "Output",
        "T_CRITERIA" => "Criteria",
        "T_CRITERIADEFAULTS" => "Defaults",
        "T_ASSIGNMENTS" => "Assignments",
        "T_ASSIGNMENT" => "Assignment",
        "T_FORMAT" => "Format",
        "T_PAGE_HEADERS" => "Page Headers",
        "T_PAGE_FOOTERS" => "Page Footers",
        "T_DISPLAY_ORDER" => "Display Order",
        "T_GROUPS" => "Groups",
        "T_GRAPHS" => "Graphs",
        "T_QUERY_COLUMNS" => "Query Columns",
        "T_ORDER_BY" => "Order By",
        "T_PRESQLS" => "Pre-SQLs",
        "T_PLOTS" => "Plots",
        "T_DETAILS" => "Details",
        "T_HEADERS" => "Headers",
        "T_TRAILERS" => "Trailers",
        "T_DETAILS" => "Details",
        "T_SQL" => "SQL",
        "T_QUERY_COLUMNS" => "Query Columns",
        "T_LINKS" => "Links",
        "T_QUERYSQL" => "SQL Query<P>(* notation<br>or wildcards<br>not allowed<br>in column<br>selection)",
        "T_NAME" => "Name",
        "T_SQLTEXT" => "SQL Text",
        "T_QUERYCOLUMNNAME" => "Main Query Column",
        "T_REPORTTITLE" => "Report Title",
        "T_REPORTDESCRIPTION" => "Report Description",
        "T_LINKFROM" => "Link From",
        "T_LINKTO" => "Link To",
        "T_LINKCLAUSE" => "Link Clause",
        "T_ASSIGNNAME" => "Assign To Existing Column",
        "T_ASSIGNNAMENEW" => "Assign To New Column",
        "T_EXPRESSION" => "Expression",
        "T_CONDITION" => "Condition",
        "T_ASSIGNAGGTYPE" => "Aggregate Type",
        "T_ASSIGNAGGCOL" => "Aggregate Column",
        "T_ASSIGNAGGGROUP" => "Grouped By",
        "T_ASSIGNGRAPHICBLOBCOL" => "Column Containing Graphic",
        "T_ASSIGNGRAPHICBLOBTAB" => "Table Containing Graphic",
        "T_ASSIGNGRAPHICBLOBMATCH" => "Column to Match Report Graphic",
        "T_ASSIGNGRAPHICWIDTH" => "Report Graphic Width",
        "T_ASSIGNGRAPHICREPORTCOL" => "Graphic Report Column",
        "T_DRILLDOWNREPORT" => "Drilldown Report",
        "T_DRILLDOWNCOLUMN" => "Drilldown To",
        "T_GROUPNAME" => "Group On Column",
        "T_GROUPNAME" => "Group On Column",
        "T_GRAPHCOLUMN" => "Group Column",
        "T_GRAPHHEIGHT" => "Graph Height",
        "T_GRAPHWIDTH" => "Graph Width",
        "T_GRAPHCOLOR" => "Graph Color",
        "T_GRAPHWIDTHPDF" => "Graph Width (PDF)",
        "T_GRAPHHEIGHTPDF" => "Graph Height (PDF)",
        "T_XTITLE" => "X Axis Title",
        "T_YTITLE" => "Y Axis Title",
        "T_GRIDPOSITION" => "Grid Position",
        "T_PLOTSTYLE" => "Plot Style",
        "T_LINECOLOR" => "Line Color",
        "T_DATATYPE" => "Data Type",
        "T_FILLCOLOR" => "Fill Color",
        "T_LEGEND" => "Legend",
        "T_XGRIDCOLOR" => "X-Grid Color",
        "T_YGRIDCOLOR" => "Y-Grid Color",
        "T_TITLEFONTSIZE" => "Title Font Size",
        "T_XTICKINTERVAL" => "X Tick Interval",
        "T_YTICKINTERVAL" => "Y Tick Interval",
        "T_XTICKLABELINTERVAL" => "X Tick Label Interval",
        "T_YTICKLABELINTERVAL" => "Y Tick Label Interval",
        "T_XTITLEFONTSIZE" => "X Title Font Size",
        "T_YTITLEFONTSIZE" => "Y Title Font Size",
        "T_MARGINCOLOR" => "Margin Color",
        "T_MARGINLEFT" => "Margin Left",
        "T_MARGINRIGHT" => "Margin Right",
        "T_MARGINTOP" => "Margin Top",
        "T_MARGINBOTTOM" => "Margin Bottom",
        "T_TITLECOLOR" => "Title Color",
        "T_XAXISCOLOR" => "X Axis Color",
        "T_YAXISCOLOR" => "Y Axis Color",
        "T_XAXISFONTCOLOR" => "X Axis Font Color",
        "T_YAXISFONTCOLOR" => "Y Axis Font Color",
        "T_XAXISFONTSIZE" => "X Axis Font Size",
        "T_YAXISFONTSIZE" => "Y Axis Font Size",
        "T_XTITLECOLOR" => "X Title Color",
        "T_YTITLECOLOR" => "Y Title Color",
        "T_PLOTCOLUMN" => "Column To Plot",
        "T_XLABELCOLUMN" => "Column for X Labels",
        "T_YLABELCOLUMN" => "Column for Y Labels",
        "T_RETURNCOLUMN" => "Return Column",
        "T_MATCHCOLUMN" => "Match Column",
        "T_DISPLAYCOLUMN" => "Display Column",
        "T_OVERVIEWCOLUMN" => "Summary Column",
        "T_CONTENTTYPE" => "Content Type",
        "T_CUSTOMSOURCE" => "CustomSource",
        "T_QUERYSQL" => "SQL Query<P>(* notation<br>or wildcards<br>not allowed<br>in column<br>selection)",
        "T_PAGESIZE" => "Page Size (PDF)",
        "T_PAGEWIDTHHTML" => "Page Width (HTML)",
        "T_PAGEORIENTATION" => "Orientation (PDF)",
        "T_TOPMARGIN" => "Top Margin (PDF)",
        "T_BOTTOMMARGIN" => "Bottom Margin (PDF)",
        "T_RIGHTMARGIN" => "Right Margin (PDF)",
        "T_LEFTMARGIN" => "Left Margin (PDF)",
        "T_PDFFONT" => "Font (PDF)",
        "T_ORDERNUMBER" => "Order Number",
        "T_BEFOREGROUPHEADER" => "Before Group Header",
        "T_AFTERGROUPHEADER" => "After Group Header",
        "T_BEFOREGROUPTRAILER" => "Before Group Trailer",
        "T_AFTERGROUPTRAILER" => "After Group Trailer",
        "T_BODYDISPLAY" => "Display Details",
        "T_GRIDDISPLAY" => "Display Grid?",
        "T_GRIDSORTABLE" => "Sortable Columns in Grid?",
        "T_GRIDSEARCHABLE" => "Grids with Search Box?",
        "T_GRIDPAGEABLE" => "Grids with Paging?",
        "T_GRIDPAGESIZE" => "Grids Page Size",
        "T_GRAPHDISPLAY" => "Display Graph",
        "T_GROUPHEADERCOLUMN" => "Group Header Column",
        "T_GROUPTRAILERDISPLAYCOLUMN" => "Group Trailer Display Column",
        "T_GROUPTRAILERVALUECOLUMN" => "Group Trailer Value Column",
        "T_LINENUMBER" => "Line Number",
        "T_HEADERTEXT" => "Header Text",
        "T_FOOTERTEXT" => "Footer Text",
        "T_COLUMNSTARTPDF" => "Column Start (PDF)",
        "T_COLUMNWIDTHPDF" => "Column Width (PDF)",
        "T_COLUMNWIDTHHTML" => "Column Width (HTML)",
        "T_COLUMN_TITLE" => "Column Title",
        "T_TOOLTIP" => "Tool Tip",
        "T_GROUP_HEADER_LABEL" => "Group Header Label",
        "T_GROUP_TRAILER_LABEL" => "Group Trailer Label",
        "T_GROUP_HEADER_LABEL_XPOS" => "Group Header Label Start",
        "T_GROUP_HEADER_DATA_XPOS" => "Group Header Value Start",
        "T_PDFFONTSIZE" => "Font Size (PDF)",
        "T_GRIDPOSITION" => "Grid Position",
        "T_XGRIDDISPLAY" => "X-Grid Style",
        "T_YGRIDDISPLAY" => "Y-Grid Style",
        "T_PLOTTYPE" => "Plot Style",
        "T_IMPORTREPORT" => "Import from report",
        "T_IMPORTREPORTITEM" => "and item",
        "T_MAKELINKTOREPORT" => "Create links to report",
        "T_MAKELINKTOREPORTITEM" => "And to item",
        "T_LINKTOREPORT" => "Linked To Report",
        "T_LINKTOREPORTITEM" => "Linked To Report Item",
        "T_ALLITEMS" => "All Items",
        "T_CRITERIALIST" => "List Values",
        "T_TITLE" => "Title",
        "T_CRITERIATYPE" => "Criteria Type",
        "T_CRITERIAHELP" => "Criteria Help",
        "T_USE" => "Use",
        "T_CRITERIADISPLAY" => "Criteria Display",
        "T_EXPANDDISPLAY" => "Expand Display",
        "T_DATABASETYPE" => "Datasource Type",
        "T_JUSTIFY" => "Justification",
        "T_COLUMN_DISPLAY" => "Show or Hide?",
        "T_TITLEFONT" => "Title Font",
        "T_TITLEFONTSTYLE" => "Title Font Style",
        "T_XTITLEFONT" => "X Title Font",
        "T_YTITLEFONT" => "Y Title Font",
        "T_XAXISFONT" => "X Label Font",
        "T_YAXISFONT" => "Y Label Font",
        "T_XAXISFONTSTYLE" => "X Label Style",
        "T_YAXISFONTSTYLE" => "Y Label Style",
        "T_XTITLEFONTSTYLE" => "X Title Font Style",
        "T_YTITLEFONTSTYLE" => "Y Title Font Style",
        "T_FORMBETWEENROWS" => "Form Style Row Separator",

        // Form Dropdowns
        "T_.DEFAULT" => "Default",
        "T_Portrait" => "Portrait",
        "T_Landscape" => "Landscape",
        "T_B5" => "B5", 
        "T_A6" => "A6", 
        "T_A5" => "A5", 
        "T_A4" => "A4", 
        "T_A3" => "A3", 
        "T_A2" => "A2", 
        "T_A1" => "A1",
        "T_US-Letter" => "US Letter",
        "T_US-Legal" => "US Legal",
        "T_US-Ledger" => "US Ledger",
        "T_hide" => "Hide",
        "T_show" => "Show",
        "T_yes" => "Yes",
        "T_no" => "No",
        "T_plain" => "Plain",
        "T_graphic" => "Graphic",
        "T_left" => "Left",
        "T_right" => "Right",
        "T_center" => "Center",
        "T_SUM" => "Sum",
        "T_AVERAGE" => "Average",
        "T_MAX" => "Maximum",
        "T_MIN" => "Minimum",
        "T_PREVIOUS" => "Previous",
        "T_SKIPLINE" => "Skip Line",
        "T_COUNT" => "Count",
        "T_TEXTFIELD" => "Text Field",
        "T_LOOKUP" => "Database Lookup",
        "T_DATE" => "Date",
        "T_DATERANGE" => "Date Range",
        "T_SQLCOMMAND" => "SQL Command",
        "T_LIST" => "Custom List",
        "T_NOINPUT" => "No Entry",
        "T_DROPDOWN" => "Drop Down List",
        "T_MULTI" => "Multiple Selection List Box",
        "T_MULTI" => "Multiple Selection List Box",
        "T_CHECKBOX" => "Checkboxes",
        "T_RADIO" => "Radio Buttons",
        "T_DMYFIELD" => "Date Fields (D/M/Y)",
        "T_MDYFIELD" => "Date Fields (M/D/Y)",
        "T_YMDFIELD" => "Date Fields (Y/M/D)",
        "T_blankline" => "Blank Line",
        "T_solidline" => "Solid Line",
        "T_newpage" => "New Page",
        "T_SQLLIMITFIRST" => "Limit/First",
        "T_SQLSKIPOFFSET" => "Skip/Offset",

        // Vertical Tab Labels
        "T_PAGE_HEADER" => "Page Header",
        "T_PAGE_FOOTER" => "Page Footer",
        "T_LINKS" => "Links",
        "T_GROUP" => "Group",
        "T_HEADER" => "Header",
        "T_ASSIGNNAME" => "Assign",
        "T_TRAILER" => "Trailer",
        "T_PLOT" => "Plot",
        "T_PRESQL" => "PreSQL",
        "T_COLUMNNAME" => "Column",
        "T_CRITERIAITEM" => "Criteria",
        "T_GRAPH" => "Graph",
        
        // Style Labels
        "T_BOLD" => "Bold",
        "T_ITALIC" => "Italic",
        "T_BOLDANDITALIC" => "Bold And Italic",
        "T_STRIKETHROUGH" => "Strike Through",
        "T_NORMAL" => "Normal",
        "T_UNDERLINE" => "Underline",
        "T_OVERLINE" => "Overline",
        "T_BLINK" => "Blink",
        "T_NONE" => "None",
        "T_NOBORDER" => "No Border",
        "T_SOLIDLINE" => "Solid Line",
        "T_DASHED" => "Dashed Line",
        "T_DOTTED" => "Dotted Line",
        "T_CELL" => "Cell",
        "T_ALLCELLS" => "All Cells In Row",
        "T_COLUMNHEADERS" => "Column Headers",
        "T_ROW" => "Row",
        "T_PAGE" => "Page",
        "T_BODY" => "Report Body",
        "T_GROUPHEADERLABEL" => "Group Header Label",
        "T_GROUPHEADERVALUE" => "Group Header Value",
        "T_GROUPTRAILER" => "Group Trailer",
        "T_ASSIGNSTYLELOCTYPE" => "Apply Style to",
        "T_ASSIGNSTYLEFGCOLOR" => "Text Colour (colour name or #rrggbb)",
        "T_ASSIGNSTYLEBGCOLOR" => "Background Colour (#rrggbb)",
        "T_ASSIGNSTYLEBORDERSTYLE" => "Border Style",
        "T_ASSIGNSTYLEBORDERSIZE" => "Border Thickness (top right bottom left)",
        "T_ASSIGNSTYLEBORDERCOLOR" => "Border Colour (colour name or #ffggbb)",
        "T_ASSIGNSTYLEMARGIN" => "Margin (top right bottom left)",
        "T_ASSIGNSTYLEPADDING" => "Padding (top right bottom left)",
        "T_ASSIGNWIDTH" => "Width",
        "T_ASSIGNFONTSIZE" => "Font Size",
        "T_ASSIGNFONTSTYLE" => "Font Style",
        "T_ASSIGNHYPERLABEL" => "Hyperlink Label",
        "T_ASSIGNHYPERURL" => "Hyperlink URL",
        "T_ASSIGNIMAGEURL" => "Image URL",
        "T_DRILLDOWNCOLUMN" => "Drilldown Column for Criteria",

        // Miscellaneous
        "T_ENTERSQL" => "Enter SQL",
        "T_ENTERCLAUSE" => "Enter Clause",
        "T_UNABLE_TO_CONTINUE" => "Unable To Continue",
        "T_UNABLE_TO_SAVE" => "Unable To Save",
        "T_UNABLE_TO_REMOVE" => "Unable To Remove",
        "T_SPECIFYXML" => " - you must specify a report file name",
        "T_MUSTADDGROUP" => "To add a graph you need to go to the Groups menu add a group on which to trigger graph. To add a graph at the end of the report, you need to add the group called REPORT_BODY and then select this as the Group Column",
        "T_SAFENOSAVE" => "Running in SAFE mode. Report definitions may not be saved.",
        "T_SAFENODEL" => "Running in SAFE mode. Report definitions may not be deleted.",
        "T_NOCRITLINK" => "No criteria items available to link to in ",
        "T_NOOPENLINK" => "Unable to open report to link to - file ",
        "T_NOOPENDIR" => "Unable to open directory ",
        "T_XMLCONFILE" => "XML Report Configuration File",
        "T_XMLFORM" => "must be in form {reportname}.xml",
        "T_NOWRITE" => "User does not have write permissions on file",
        "T_NOFILE" => "File not found",
        "T_REPORTFILE" => "Report File",
        "T_DELETEOKACT" => "deleted successfully. Report definition is still active. If you did not mean to delete report you can press the Save button to recreate it",

        // Assignment Wizards
        "T_OUTPUTIMAGE" => "Image URL Wizard",
        "T_OUTPUTHYPERLINK" => "Hyperlink Wizard",
        "T_OUTPUTSTYLESWIZARD" => "Output Styles Wizard",
        "T_AGGREGATESWIZARD" => "Aggregates Wizard",
        "T_DATABASEGRAPHICWIZARD" => "Database Graphic Wizard",
        "T_DRILLDOWNWIZARD" => "Drilldown Wizard",
        "T_ROWSTYLE" => "Row Style",
        "T_PAGESTYLE" => "Page Style",
        "T_COLUMNHEADERSTYLE" => "Column Header Style",
        "T_REPORTBODYSTYLE" => "Report Body Style",
        "T_ALLCELLSSTYLE" => "All Cells Style",
        "T_CELLSTYLE" => "Column Style",
        "T_GRPHEADERLABELSTYLE" => "Group Header Label Style",
        "T_GRPHEADERVALUESTYLE" => "Group Header Value Style",
        "T_GROUPTRAILERSTYLE" => "Group Trailer Style",
        
        // Validation
        "T_INVALIDENTRY" => "Invalid entry - ",
        "T_FORFIELD" => "for field - ",
        "T_PAGEMARGINWITHWIDTH" => "Warning - When setting a page margin you should probably set page width as well",
        "T_SETBORDERSTYLE" => "If setting a border thickness or colour, border style should not be none",
        "T_HTMLCOLOR" => "Color must be an RGB value in HTML format ( #rrggbb )",
        "T_CSSFONTSIZE" => "Font size must be a font size optionally followed by 'pt'",
        "T_CSS1SIZE" => "Size must be a CSS size value, either a number followed by 'px' or '%' ",
        "T_CSS4SIZE" => "Size must be 4 space-delimited numbers (for top, left, bottom, right) each a number followed by 'px' or '%'",
        "T_NUMBER" => "Value must be number",

        )
        );
?>
