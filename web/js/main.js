$(document).on('change', '#pgde_emploibundle_userdata_regionNaiss, #pgde_emploibundle_userdata_departementnaiss',
    function () {
    let $field = $(this)
    let $regionField = $('#pgde_emploibundle_userdata_regionNaiss')
    let $form = $field.closest('form')
    let target = '#' + $field.attr('id').replace('regionNaiss', 'departementnaiss')
    // Les données à envoyer en Ajax
    let data = {}
    data[$regionField.attr('name')] = $regionField.val()
    data[$field.attr('name')] = $field.val()
    // On soumet les données
    $.post($form.attr('action'), data).then(function (data) {
        // On récupère le nouveau <select>
        let $input = $(data).find(target)
        // On remplace notre <select> actuel
        $(target).replaceWith($input)
    })
})

$(document).on('change', '#pgde_emploibundle_userdata_regionResidence', '#pgde_emploibundle_userdata_departementresidence',
    function () {
        let $field = $(this)
        let $regionField = $('#pgde_emploibundle_userdata_regionResidence')
        let $form = $field.closest('form')
        let target = '#' + $field.attr('id').replace('regionR', 'departementr')
        // Les données à envoyer en Ajax
        let data = {}
        data[$regionField.attr('name')] = $regionField.val()
        data[$field.attr('name')] = $field.val()
        // On soumet les données
        $.post($form.attr('action'), data).then(function (data) {
            // On récupère le nouveau <select>
            let $input = $(data).find(target)
            // On remplace notre <select> actuel
            $(target).replaceWith($input)
        })
    })

$(document).on('change', '#pgde_emploibundle_userdata_secteur1', '#pgde_emploibundle_userdata_emploi1',
    function () {
        let $field = $(this)
        let $regionField = $('#pgde_emploibundle_userdata_secteur1')
        let $form = $field.closest('form')
        let target = '#' + $field.attr('id').replace('secteur1', 'emploi1')
        // Les données à envoyer en Ajax
        let data = {}
        data[$regionField.attr('name')] = $regionField.val()
        data[$field.attr('name')] = $field.val()
        // On soumet les données
        $.post($form.attr('action'), data).then(function (data) {
            // On récupère le nouveau <select>
            let $input = $(data).find(target)
            // On remplace notre <select> actuel
            $(target).replaceWith($input)
        })
    })


$(document).on('change', '#pgde_emploibundle_userdata_secteur2', '#pgde_emploibundle_userdata_emploi2',
    function () {
        let $field = $(this)
        let $regionField = $('#pgde_emploibundle_userdata_secteur2')
        let $form = $field.closest('form')
        let target = '#' + $field.attr('id').replace('secteur2', 'emploi2')
        // Les données à envoyer en Ajax
        let data = {}
        data[$regionField.attr('name')] = $regionField.val()
        data[$field.attr('name')] = $field.val()
        // On soumet les données
        $.post($form.attr('action'), data).then(function (data) {
            // On récupère le nouveau <select>
            let $input = $(data).find(target)
            // On remplace notre <select> actuel
            $(target).replaceWith($input)
        })
    })