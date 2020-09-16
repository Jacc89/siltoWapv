"use strict";
var vscode_1 = require('vscode');
var add_files_1 = require('./add-files');
var add_files_extended_1 = require('./add-files-extended');
function activate(context) {
    console.log('Congratulations, your extension is now active!');
    var addAngularNativeFiles = vscode_1.commands.registerCommand('extension.addAngularNativeFiles', function (args) {
        var addFiles = new add_files_1.AddFiles();
        addFiles.showFileNameDialog(args)
            .then(addFiles.createFolder)
            .then(addFiles.createFiles)
            .then(addFiles.openFileInEditor)
            .catch(function (err) {
            if (err) {
                vscode_1.window.showErrorMessage(err);
            }
        });
    });
    var addAngularNativeFilesExtended = vscode_1.commands.registerCommand('extension.addAngularNativeFilesExtended', function (args) {
        var addFilesExtended = new add_files_extended_1.AddFilesExtended();
        addFilesExtended.showFileNameDialog(args)
            .then(addFilesExtended.createFolder)
            .then(addFilesExtended.createFiles)
            .then(addFilesExtended.openFileInEditor)
            .catch(function (err) {
            if (err) {
                vscode_1.window.showErrorMessage(err);
            }
        });
    });
    context.subscriptions.push(addAngularNativeFiles);
    context.subscriptions.push(addAngularNativeFilesExtended);
}
exports.activate = activate;
//# sourceMappingURL=extension.js.map