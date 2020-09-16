"use strict";
var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
/// <reference path="../typings/tsd.d.ts" />
var vscode_1 = require('vscode');
var file_contents_extended_1 = require('./file-contents-extended');
var add_files_1 = require('./add-files');
var fs = require('fs');
var path = require('path');
var Q = require('q');
var AddFilesExtended = (function (_super) {
    __extends(AddFilesExtended, _super);
    function AddFilesExtended() {
        _super.apply(this, arguments);
    }
    // Create the new "shared" folder for model and service
    AddFilesExtended.prototype.createFolder = function (folderName) {
        var deferred = Q.defer();
        var fileExists = fs.existsSync(folderName);
        if (!fileExists) {
            fs.mkdir(folderName, function (err) {
                fs.mkdirSync(path.join(folderName, 'shared'));
                deferred.resolve(folderName);
            });
        }
        else {
            deferred.reject('Folder already exists');
        }
        return deferred.promise;
    };
    // Get file contents and create the new files in the folder 
    AddFilesExtended.prototype.createFiles = function (folderName) {
        var deferred = Q.defer();
        var inputName = path.parse(folderName).name;
        var fc = new file_contents_extended_1.FileContentsExtended();
        var afe = new AddFilesExtended();
        // create an IFiles array including file names and contents
        var files = [
            {
                name: path.join(folderName, inputName + ".component.ts"),
                content: fc.componentContent(inputName)
            },
            {
                name: path.join(folderName, inputName + ".component.html"),
                content: fc.templateContent(inputName)
            },
            {
                name: path.join(folderName, inputName + ".component.css"),
                content: fc.cssContent(inputName)
            },
            {
                name: path.join(folderName, inputName + ".component.spec.ts"),
                content: fc.specContent(inputName)
            },
            {
                name: path.join(folderName, 'shared', inputName + ".service.ts"),
                content: fc.serviceContent(inputName)
            },
            {
                name: path.join(folderName, 'shared', inputName + ".model.ts"),
                content: fc.modelContent(inputName)
            }
        ];
        // write files
        afe.writeFiles(files).then(function (errors) {
            if (errors.length > 0) {
                vscode_1.window.showErrorMessage(errors.length + " file(s) could not be created. I'm sorry :-(");
            }
            else {
                deferred.resolve(folderName);
            }
        });
        return deferred.promise;
    };
    return AddFilesExtended;
}(add_files_1.AddFiles));
exports.AddFilesExtended = AddFilesExtended;
//# sourceMappingURL=add-files-extended.js.map