"use strict";
/// <reference path="../typings/tsd.d.ts" />
var vscode_1 = require('vscode');
var file_contents_1 = require('./file-contents');
var fs = require('fs');
var path = require('path');
var Q = require('q');
var AddFiles = (function () {
    function AddFiles() {
    }
    // Show input prompt for folder name 
    // The imput is also used to create the files with the respective name as defined in the Angular2 style guide [https://angular.io/docs/ts/latest/guide/style-guide.html] 
    AddFiles.prototype.showFileNameDialog = function (args) {
        var deferred = Q.defer();
        var clickedFolderPath;
        if (args) {
            clickedFolderPath = args.fsPath;
        }
        else {
            if (!vscode_1.window.activeTextEditor) {
                deferred.reject('Please open a file first.. or just right-click on a file/folder and use the context menu!');
                return deferred.promise;
            }
            else {
                clickedFolderPath = path.dirname(vscode_1.window.activeTextEditor.document.fileName);
            }
        }
        var newFolderPath = fs.lstatSync(clickedFolderPath).isDirectory() ? clickedFolderPath : path.dirname(clickedFolderPath);
        if (vscode_1.workspace.rootPath === undefined) {
            deferred.reject('Please open a project first. Thanks! :-)');
        }
        else {
            vscode_1.window.showInputBox({
                prompt: 'What\'s the name of the new folder?',
                value: 'folder'
            }).then(function (fileName) {
                if (!fileName || /[~`!#$%\^&*+=\[\]\\';,/{}|\\":<>\?\s]/g.test(fileName)) {
                    deferred.reject('That\'s not a valid name! (no whitespaces or special characters)');
                }
                else {
                    deferred.resolve(path.join(newFolderPath, fileName));
                }
            }, function (error) { return console.error(error); });
        }
        return deferred.promise;
    };
    // Create the new folder
    AddFiles.prototype.createFolder = function (folderName) {
        var deferred = Q.defer();
        fs.exists(folderName, function (exists) {
            if (!exists) {
                fs.mkdirSync(folderName);
                deferred.resolve(folderName);
            }
            else {
                deferred.reject('Folder already exists');
            }
        });
        return deferred.promise;
    };
    // Get file contents and create the new files in the folder 
    AddFiles.prototype.createFiles = function (folderName) {
        var deferred = Q.defer();
        var inputName = path.parse(folderName).name;
        var fc = new file_contents_1.FileContents();
        var af = new AddFiles();
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
            }
        ];
        // write files
        af.writeFiles(files).then(function (errors) {
            if (errors.length > 0) {
                vscode_1.window.showErrorMessage(errors.length + " file(s) could not be created. I'm sorry :-(");
            }
            else {
                deferred.resolve(folderName);
            }
        });
        return deferred.promise;
    };
    AddFiles.prototype.writeFiles = function (files) {
        var deferred = Q.defer();
        var errors = [];
        files.forEach(function (file) {
            fs.writeFile(file.name, file.content, function (err) {
                if (err) {
                    errors.push(err.message);
                }
                deferred.resolve(errors);
            });
        });
        return deferred.promise;
    };
    // Open the created component in the editor
    AddFiles.prototype.openFileInEditor = function (folderName) {
        var deferred = Q.defer();
        var inputName = path.parse(folderName).name;
        ;
        var fullFilePath = path.join(folderName, inputName + ".component.ts");
        vscode_1.workspace.openTextDocument(fullFilePath).then(function (textDocument) {
            if (!textDocument) {
                return;
            }
            vscode_1.window.showTextDocument(textDocument).then(function (editor) {
                if (!editor) {
                    return;
                }
                deferred.resolve(editor);
            });
        });
        return deferred.promise;
    };
    return AddFiles;
}());
exports.AddFiles = AddFiles;
//# sourceMappingURL=add-files.js.map