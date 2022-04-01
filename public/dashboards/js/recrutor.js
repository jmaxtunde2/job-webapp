
// Add Emploi
$("#addEmploiForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addEmploi"), "Emploi Ajouté", datas, '/compte/'+user_type+'/post/ajouter-un-emploi', '', $("#msg"));
}));

// Edit pays
$("#editEmploi").on('submit',(function(e) {
    e.preventDefault(); 
    var id = $("#editEmploi").data('id');
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editEmploi"), "Emploi Modifié", datas, '/compte/'+user_type+'/post/editer-un-emploi/'+id, '/compte/'+user_type+'/liste-des-emplois', $("#msg"));
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
