
// Add Emploi
$("#addCandidatForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addCandidat"), "Profil Ajouté", datas, '/compte/'+user_type+'/post/profil', '', $("#msg"));
}));

$("#addCandidatFormationForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addCandidatFormation"), "Curse Ajouté", datas, '/compte/'+user_type+'/post/cursus', '', $("#msg"));
}));


$("#addCandidatExperience").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addCandidatExperience"), "Experience Ajouté", datas, '/compte/'+user_type+'/post/cursus', '', $("#msg"));
}));

$("#addReferenceFormationForm").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-addReferenceFormation"), "Reference Ajouté", datas, '/compte/'+user_type+'/post/reference', '', $("#msg"));
}));