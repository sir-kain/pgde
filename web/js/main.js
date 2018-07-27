$(document).on('change', '#pgde_emploibundle_userdata_regionNaiss',
    function () {
        let $field = $(this);
        // let $regionField = $('#pgde_emploibundle_userdata_regionNaiss')
        let $form = $field.closest('form');
        let target = '#pgde_emploibundle_userdata_departementnaiss';
        // Les données à envoyer en Ajax
        let data = {};
        // data[$regionField.attr('name')] = $regionField.val()
        data[$field.attr('name')] = $field.val();
        // On soumet les données
        $('#naissloader').show();
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            data: data,
            success: function (html) {
                // Replace current position field ...
                $(target).replaceWith(
                    // ... with the returned one from the AJAX response.
                    $(html).find(target)
                );
                // Position field now displays the appropriate positions.
                $('#naissloader').hide();
            }
        });
    }
);

$(document).on('change', '#pgde_emploibundle_userdata_regionResidence',
    function () {
        let $field = $(this);
        // let $regionField = $('#pgde_emploibundle_userdata_regionNaiss')
        let $form = $field.closest('form');
        let target = '#pgde_emploibundle_userdata_departementresidence';
        // Les données à envoyer en Ajax
        let data = {};
        // data[$regionField.attr('name')] = $regionField.val()
        data[$field.attr('name')] = $field.val();
        // On soumet les données

        $('#residloader').show();
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            data: data,
            success: function (html) {
                // Replace current position field ...
                $(target).replaceWith(
                    // ... with the returned one from the AJAX response.
                    $(html).find(target)
                );
                // Position field now displays the appropriate positions.
                $('#residloader').hide();
            }
        });
    }
);

$(document).on('change', '#pgde_emploibundle_userdata_secteur1', '#pgde_emploibundle_userdata_emploi1',
    function () {
        let $field = $(this);
        let $regionField = $('#pgde_emploibundle_userdata_secteur1');
        let $form = $field.closest('form');
        let target = '#' + $field.attr('id').replace('secteur1', 'emploi1');
        // Les données à envoyer en Ajax
        let data = {};
        data[$regionField.attr('name')] = $regionField.val();
        data[$field.attr('name')] = $field.val();
        // On soumet les données
        $('#emploi1loader').show();
        $.post($form.attr('action'), data).then(function (data) {
            // On récupère le nouveau <select>
            let $input = $(data).find(target);
            // On remplace notre <select> actuel
            $(target).replaceWith($input)
            $('#emploi1loader').hide();
        })
    });


$(document).on('change', '#pgde_emploibundle_userdata_secteur2', '#pgde_emploibundle_userdata_emploi2',
    function () {
        let $field = $(this);
        let $regionField = $('#pgde_emploibundle_userdata_secteur2');
        let $form = $field.closest('form');
        let target = '#' + $field.attr('id').replace('secteur2', 'emploi2');
        // Les données à envoyer en Ajax
        let data = {};
        data[$regionField.attr('name')] = $regionField.val();
        data[$field.attr('name')] = $field.val();
        // On soumet les données
        $('#emploi2loader').show();
        $.post($form.attr('action'), data).then(function (data) {
            // On récupère le nouveau <select>
            let $input = $(data).find(target);
            // On remplace notre <select> actuel
            $(target).replaceWith($input)
            $('#emploi2loader').hide();
        })
    });


$(document).ready(function () {

    $('#gritter-image').click(function () {
        $.gritter.add({
            title: 'Jane Doe',
            text: 'Online',
            image: 'assets/img/user3.png',
            time: 2000,
            after_close: function () {
                $.gritter.add({
                    title: 'Jordan Smith',
                    text: 'Offline',
                    image: 'assets/img/user5.png',
                    time: 2000
                });

                if ($('#gritter-sound-switch').is(':checked')) {
                    offlineSound.play();
                }
            }
        });
    });

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn'),
        allPrevBtn = $('.prevBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url'], #pgde_emploibundle_userdata_genre"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");

            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    allPrevBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url'], #pgde_emploibundle_userdata_genre"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = true;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-success').trigger('click');


//    Ajax pour les messages flash

    let elementSectionForGitterAfterRessetingPassword = $('#gritterimage');
    let messagetext = elementSectionForGitterAfterRessetingPassword.attr('data-message');
    let urlavatar = elementSectionForGitterAfterRessetingPassword.attr('data-img');
    let username = elementSectionForGitterAfterRessetingPassword.attr('data-username');
    let urlpath = elementSectionForGitterAfterRessetingPassword.attr('data-urlpath');
    $.ajax({
        url: urlpath,
        success: function () {
            if (elementSectionForGitterAfterRessetingPassword.hasClass('gritter')) {
                $.extend($.gritter.options, {
                    position: 'top-left'
                });
                $.gritter.add({
                    title: username,
                    text: messagetext,
                    image: urlavatar,
                    sticky: true,
                });
            }
        }
    });


    let elementSectionForGitterLogout = $('#gritter-logout');
    let messageLogout = elementSectionForGitterLogout.attr('data-message');
    let urlavatarLogout = elementSectionForGitterLogout.attr('data-img');
    let usernameLogout = elementSectionForGitterLogout.attr('data-username');
    let urlpathLogout = elementSectionForGitterLogout.attr('data-urlpath');
    $.ajax({
        url: urlpathLogout,
        success: function () {
            if (elementSectionForGitterLogout.hasClass('gritter')) {
                $.gritter.add({
                    title: usernameLogout,
                    text: messageLogout,
                    image: urlavatarLogout,
                    // sticky: true,
                    time: 2000,
                });
            }
        }
    });

    let elementSectionForGitterLogin = $('#gritter-login');
    let messageLogin = elementSectionForGitterLogin.attr('data-message');
    let urlavatarLogin = elementSectionForGitterLogin.attr('data-img');
    let usernameLogin = elementSectionForGitterLogin.attr('data-username');
    let urlpathLogin = elementSectionForGitterLogin.attr('data-urlpath');
    $.ajax({
        url: urlpathLogin,
        success: function () {
            if (elementSectionForGitterLogin.hasClass('gritter')) {
                $.gritter.add({
                    title: usernameLogin,
                    text: messageLogin,
                    image: urlavatarLogin,
                    time: 2000,
                });
            }
        }
    });


//    modif demande
    let elementSectionForGitterModifDemande = $('#gritter-modifdemande');
    let messagemodifdemand = elementSectionForGitterModifDemande.attr('data-message');
    let urlavatarmodifdemand = elementSectionForGitterModifDemande.attr('data-img');
    let usernamemodifdemand = elementSectionForGitterModifDemande.attr('data-username');
    let urlpathmodifdemand = elementSectionForGitterModifDemande.attr('data-urlpath');
    $.ajax({
        url: urlpathmodifdemand,
        success: function () {
            if (elementSectionForGitterModifDemande.hasClass('gritter')) {
                $.gritter.add({
                    title: usernamemodifdemand,
                    text: messagemodifdemand,
                    image: urlavatarmodifdemand,
                    time: 2000,
                });
            }
        }
    });


//    Mask de champs du formulaire
//     $('#pgde_emploibundle_userdata_utilisateur_numberid').mask('9-999-9999-99999', {placeholder: ""})
//     $('#fos_user_registration_form_numberid').mask('9-999-9999-99999', {placeholder: ""})
//     $('#pgde_emploibundle_userdata_telephone1').mask('99-999-99-99', {placeholder: ""})
//     $('#pgde_emploibundle_userdata_telephone2').mask('99-999-99-99', {placeholder: ""})

    $(document).on('change', '#pgde_emploibundle_userdata_departementresidence',
        function () {
            if ($('#pgde_emploibundle_userdata_departementresidence option:selected').text() === "Hors Sénégal") {
                $('#pgde_emploibundle_userdata_telephone1').unmask()
                $('#pgde_emploibundle_userdata_telephone2').unmask()
            } else {
                $('#pgde_emploibundle_userdata_telephone1').mask('99-999-99-99', {placeholder: ""})
                $('#pgde_emploibundle_userdata_telephone2').mask('99-999-99-99', {placeholder: ""})
            }
        }
    );


//    datepicker
//     let dtp = $('#pgde_emploibundle_userdata_datenaiss').datepicker()
//         .on('changeDate', function (e) {
//             dtp.datepicker('hide');
//         });

//    touchspin pour les champs de type number
    $("#pgde_emploibundle_userdata_nombreenfant").TouchSpin({
        buttondown_class: 'btn btn-primary-theme',
        buttonup_class: 'btn btn-primary-theme'
    });
    $("#pgde_emploibundle_userdata_anneeexperience1").TouchSpin({
        buttondown_class: 'btn btn-primary-theme',
        buttonup_class: 'btn btn-primary-theme'
    });
    $("#pgde_emploibundle_userdata_anneeexperience2").TouchSpin({
        buttondown_class: 'btn btn-primary-theme',
        buttonup_class: 'btn btn-primary-theme'
    });

//    delete .form-group for all <select>
    if ($('#s2id_pgde_emploibundle_userdata_situationmatrimoniale').hasClass('form-control')) {
        $('#s2id_pgde_emploibundle_userdata_situationmatrimoniale').removeClass('form-control')
    }
    if ($('#s2id_pgde_emploibundle_userdata_regionNaiss').hasClass('form-control')) {
        $('#s2id_pgde_emploibundle_userdata_regionNaiss').removeClass('form-control')
    }
    if ($('#s2id_pgde_emploibundle_userdata_regionResidence').hasClass('form-control')) {
        $('#s2id_pgde_emploibundle_userdata_regionResidence').removeClass('form-control')
    }
    if ($('#s2id_pgde_emploibundle_userdata_academic').hasClass('form-control')) {
        $('#s2id_pgde_emploibundle_userdata_academic').removeClass('form-control')
    }
    if ($('#s2id_pgde_emploibundle_userdata_secteur1').hasClass('form-control')) {
        $('#s2id_pgde_emploibundle_userdata_secteur1').removeClass('form-control')
    }
    if ($('#s2id_pgde_emploibundle_userdata_secteur2').hasClass('form-control')) {
        $('#s2id_pgde_emploibundle_userdata_secteur2').removeClass('form-control')
    }

    if ($('#s2id_pgde_emploibundle_userdata_handicap').hasClass('form-control')) {
        $('#s2id_pgde_emploibundle_userdata_handicap').removeClass('form-control')
    }

//    compteur js
    $('.count').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 3000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });



    //Verification numero d'identification pour formulaire demande
    $('#pgde_emploibundle_userdata_utilisateur_numberid').focusout(function () {
        var valeur = $('#pgde_emploibundle_userdata_utilisateur_numberid').val()

        var regex = new RegExp('^(^(^(\\d{1}([a-z]|\\d{1})\\d{11})$|\\d{14}$)|[a-z]\\d{8})$', 'gi')
        if(!regex.test(valeur)) {
            $('#matchIdCardDemande')
                .empty()
                .append('Le numéro est invalide');
        } else {
            $('#matchIdCardDemande').empty();
        }
    })

    $('#naissloader').hide();
    $('#residloader').hide();
    $('#emploi1loader').hide();
    $('#emploi2loader').hide();

    // Control du champs diplome
    $('#intitule').fadeIn('slow')
    $('#annee').fadeIn('slow')
    $('#etablissement').fadeIn('slow')
    $('#autredip').fadeIn('slow')
    $('#specialite').fadeIn('slow')
    $('#aucundip').fadeOut('slow')

    $('#pgde_emploibundle_userdata_academic').change(function (e) {
        let selecteditem = $(this).val();
        if (selecteditem == 14) {
            $('#intitule').fadeOut('slow')
            $('#annee').fadeOut('slow')
            $('#etablissement').fadeOut('slow')
            $('#autredip').fadeOut('slow')
            $('#specialite').fadeOut('slow')
            $('#aucundip').fadeIn('slow')
            $('#pgde_emploibundle_userdata_diplome').val('')
            $('#pgde_emploibundle_userdata_anneediplome').val('')
            $('#pgde_emploibundle_userdata_specialite').val('')
            $('#pgde_emploibundle_userdata_etablissementdiplome').val('')
            $('#pgde_emploibundle_userdata_autresdiplomes').val('')
        } else {
            $('#intitule').fadeIn('slow')
            $('#annee').fadeIn('slow')
            $('#etablissement').fadeIn('slow')
            $('#autredip').fadeIn('slow')
            $('#specialite').fadeIn('slow')
            $('#aucundip').fadeOut('slow')
        }
    })

    if ($('#pgde_emploibundle_userdata_academic').val() == 14) {
        $('#intitule').fadeOut('slow')
        $('#annee').fadeOut('slow')
        $('#etablissement').fadeOut('slow')
        $('#autredip').fadeOut('slow')
        $('#specialite').fadeOut('slow')
        $('#aucundip').fadeIn('slow')
        $('#pgde_emploibundle_userdata_diplome').val('')
        $('#pgde_emploibundle_userdata_anneediplome').val('')
        $('#pgde_emploibundle_userdata_specialite').val('')
        $('#pgde_emploibundle_userdata_etablissementdiplome').val('')
        $('#pgde_emploibundle_userdata_autresdiplomes').val('')
    }


//    Lightbox
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
});

