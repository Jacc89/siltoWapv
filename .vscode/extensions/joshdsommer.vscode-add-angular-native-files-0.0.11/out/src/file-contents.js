"use strict";
var FileContents = (function () {
    function FileContents() {
    }
    FileContents.prototype.camelCase = function (input) {
        return input.replace(/-([a-z])/gi, function (all, letter) {
            return letter.toUpperCase();
        });
    };
    FileContents.prototype.componentContent = function (inputName) {
        var inputUpperCase;
        inputUpperCase = inputName.charAt(0).toUpperCase() + inputName.slice(1);
        inputUpperCase = this.camelCase(inputUpperCase);
        var componentContent = "import { Component, OnInit } from '@angular/core';\n" +
            '\n' +
            '@Component({\n' +
            '\tmoduleId: module.id,\n' +
            "\tselector: '" +
            inputName +
            "',\n" +
            "\ttemplateUrl: './" +
            inputName +
            ".component.html',\n" +
            "\tstyleUrls: ['./" +
            inputName +
            ".component.css']\n" +
            '})\n' +
            '\n' +
            'export class ' +
            inputUpperCase +
            'Component implements OnInit {\n' +
            '\n' +
            '\tconstructor() { }\n' +
            '\n' +
            '\tngOnInit() { }\n' +
            '}';
        return componentContent;
    };
    FileContents.prototype.templateContent = function (inputName) {
        var inputUpperCase;
        inputUpperCase = inputName.charAt(0).toUpperCase() + inputName.slice(1);
        inputUpperCase = this.camelCase(inputUpperCase);
        var templateContent = "<Label class=\"" + inputName + "\" text=\"Hello " + inputUpperCase + "Component!\"></Label>";
        return templateContent;
    };
    FileContents.prototype.cssContent = function (inputName) {
        var inputUpperCase = inputName.charAt(0).toUpperCase() + inputName.slice(1);
        var cssContent = "." + inputName + " {\n\n}";
        return cssContent;
    };
    FileContents.prototype.specContent = function (inputName) {
        var inputUpperCase;
        inputUpperCase = inputName.charAt(0).toUpperCase() + inputName.slice(1);
        inputUpperCase = this.camelCase(inputUpperCase);
        var specContent = "import { TestBed, inject } from '@angular/core/testing';\n\n" +
            'import { ' +
            inputUpperCase +
            "Component } from './" +
            inputName +
            ".component';\n" +
            '\n' +
            "describe('a " +
            inputName +
            " component', () => {\n" +
            '\tlet component: ' +
            inputUpperCase +
            'Component;\n' +
            '\n' +
            '\t// register all needed dependencies\n' +
            '\tbeforeEach(() => {\n' +
            '\t\tTestBed.configureTestingModule({\n' +
            '\t\t\tproviders: [\n' +
            '\t\t\t\t' +
            inputUpperCase +
            'Component\n' +
            '\t\t\t]\n' +
            '\t\t});\n' +
            '\t});\n' +
            '\n' +
            '\t// instantiation through framework injection\n' +
            '\tbeforeEach(inject([' +
            inputUpperCase +
            'Component], (' +
            inputUpperCase +
            'Component) => {\n' +
            '\t\tcomponent = ' +
            inputUpperCase +
            'Component;\n' +
            '\t}));\n' +
            '\n' +
            "\tit('should have an instance', () => {\n" +
            '\t\texpect(component).toBeDefined();\n' +
            '\t});\n' +
            '});';
        return specContent;
    };
    return FileContents;
}());
exports.FileContents = FileContents;
//# sourceMappingURL=file-contents.js.map