// Add User
$("#addCategoryForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addCategory"), "Categorie Ajoutée", datas, '/compte/'+user_type+'/post/ajouter-une-categorie', '/compte/'+user_type+'/ajouter-une-categorie', $("#msg"));
}));

// Edit User
$("#editCategorie").on('submit',(function(e) {
    e.preventDefault();
    var id = $("#editCategorie").data('id');
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editCategory"), "Categorie Modifiée", datas, '/compte/'+user_type+'/post/editer-une-categorie/'+id, '/compte/'+user_type+'/categories-list', $("#msg"));
}));


// Add type
$("#addTypeForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addType"), "Type Ajouté", datas, '/compte/'+user_type+'/post/ajouter-un-type-de-job', '/compte/'+user_type+'/ajouter-un-type-de-job', $("#msg"));
}));

// Edit User
$("#editType").on('submit',(function(e) {
    e.preventDefault();
    var id = $("#editType").data('id');
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editType"), "Type Modifié", datas, '/compte/'+user_type+'/post/editer-un-type-de-job/'+id, '/compte/'+user_type+'/liste-des-types', $("#msg"));
}));


// Add Ville
$("#addVilleForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addVille"), "Ville Ajoutée", datas, '/compte/'+user_type+'/post/ajouter-une-ville', '/compte/'+user_type+'/ajouter-une-ville', $("#msg"));
}));

// Edit User
$("#editVille").on('submit',(function(e) {
    e.preventDefault();
    var id = $("#editVille").data('id');
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editVille"), "Ville Modifiée", datas, '/compte/'+user_type+'/post/editer-une-ville/'+id, '/compte/'+user_type+'/liste-des-villes', $("#msg"));
}));

// Add Pays
$("#addPaysForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addPays"), "Pays Ajouté", datas, '/compte/'+user_type+'/post/ajouter-un-pays', '/compte/'+user_type+'/ajouter-un-pays', $("#msg"));
}));

// Edit pays
$("#editPays").on('submit',(function(e) {
    e.preventDefault(); 
    var id = $("#editPays").data('id');
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editPays"), "Pays Modifié", datas, '/compte/'+user_type+'/post/editer-un-pays/'+id, '/compte/'+user_type+'/liste-des-pays', $("#msg"));
}));


// Add Emploi
$("#addEmploiForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addEmploi"), "Emploi Ajouté", datas, '/compte/'+user_type+'/post/ajouter-un-emploi', '/compte/'+user_type+'/ajouter-un-emploi', $("#msg"));
}));

// Edit pays
$("#editEmploi").on('submit',(function(e) {
    e.preventDefault(); 
    var id = $("#editEmploi").data('id');
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editEmploi"), "Emploi Modifié", datas, '/compte/'+user_type+'/post/editer-un-emploi/'+id, '/compte/'+user_type+'/liste-des-emplois', $("#msg"));
}));

// Edit Settings
$("#editSetting").on('submit',(function(e) {
    e.preventDefault(); 
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editSetting"), "Parametre Modifié", datas, '/compte/'+user_type+'/post/modifier-le-parametre', '/compte/'+user_type+'/modifier-le-parametre', $("#msg"));
}));

// Add User
$("#addUserForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addUser"), " Utilisateur Ajouté", datas, '/compte/'+user_type+'/post/adduser', '/compte/'+user_type+'/add-user', $("#msg"));
}));

// Edit User
$("#editUser").on('submit',(function(e) {
    e.preventDefault();
    var id = $("#editUser").data('id');
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editUser"), " Utilisateur Modifié", datas, '/compte/'+user_type+'/post/edit-user/'+id, '/compte/'+user_type+'/users-list', $("#msg"));
}));


// Add User
$("#addPubliciteForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addPublicite"), " Publicité Ajoutée", datas, '/compte/'+user_type+'/post/ajouter-une-publicite', '/compte/'+user_type+'/ajouter-une-publicite', $("#msg"));
}));

// Edit User
$("#editPublicite").on('submit',(function(e) {
    e.preventDefault();
    var id = $("#editPublicite").data('id');
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editPublicite"), " Publicité Modifiée", datas, '/compte/'+user_type+'/editer-une-publicite/'+id, '/compte/'+user_type+'/liste-des-publicites', $("#msg"));
}));
