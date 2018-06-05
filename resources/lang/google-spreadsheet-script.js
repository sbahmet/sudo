function bootstrapLocaleSheets() {

    var values = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('main').getRange("C3:Z3").getValues();

    var locales = [];
    var defaultLocale = values[0][0];

    bootstrapDefaultLocaleSheet(defaultLocale);

    for (var i = 1; i < values[0].length; i++) {
        if (values[0][i]) {
            locales.push(values[0][i]);
            bootstrapLocaleSheet(values[0][i], i);
        }
    }






    function bootstrapLocaleSheet(locale, index) {
        var sheet = SpreadsheetApp.getActiveSpreadsheet().insertSheet().setName(locale);
        sheet.getRange("A1:H1").merge();
        sheet.getRange(1, 1).setFormula('main!A1').setFontSize(18).setBackground("#fff2cc");
        sheet.setRowHeight(1, 60);
        sheet.getRange("C3").setValue(defaultLocale);
        sheet.getRange("B3").setFormula('main!B3');
        sheet.getRange("D3").setValue(locale);
        sheet.getRange("B4").setFormula("main!B4").copyTo(sheet.getRange("B4:B1000"));

        sheet.getRange("C4").setFormula(defaultLocale + "!C4").copyTo(sheet.getRange("C5:C1000"));

        var mainSheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('main');

        mainSheet.getRange(4, 3+i, 1,1).setFormula(locale+'!D4').copyTo(
            mainSheet.getRange(4, 3+i, 1000-3, 1)
        );

        sheet.setFrozenRows(3); sheet.autoResizeColumn(2).setColumnWidth(1, 10).setColumnWidths(3, 2, 300);


    }

    function bootstrapDefaultLocaleSheet(locale) {
        var sheet = SpreadsheetApp.getActiveSpreadsheet().insertSheet().setName(locale);
        sheet.getRange("A1:H1").merge();
        sheet.getRange(1, 1).setFormula('main!A1').setFontSize(18).setBackground("#fff2cc");
        sheet.setRowHeight(1, 60);
        sheet.getRange("C3").setValue(defaultLocale);
        sheet.getRange("B3").setFormula('main!B3');

        sheet.getRange("A4").setFormula("main!A4").copyTo(sheet.getRange("A4:B1000"));

        var mainSheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('main');

        mainSheet.getRange(4, 3, 1,1).setFormula(locale+'!C4').copyTo(
            mainSheet.getRange(4, 3, 1000-3, 1)
        );
        sheet.setFrozenRows(3); sheet.autoResizeColumn(2).setColumnWidth(3, 300);

    }

}

