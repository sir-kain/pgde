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

$(document).ready(function () {

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
                isValid = false;
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
                    sticky: true,
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
                    sticky: true,
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
                    sticky: true,
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


//    style markdown
    let mklist = document.querySelectorAll('.md-header button');
    mklist.forEach(function (index) {
        if (index.title !== 'Preview') index.style.color = "gray";
    });


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


    $('#repeatemail').on("cut copy paste", function (e) {
        e.preventDefault();
    });

    $('#fos_user_registration_form_plainPassword_second').on("cut copy paste", function (e) {
        e.preventDefault();
    });

//    controle repetition email
    let registable = false;
    $('#register_button').attr('disabled', true)
    $('#repeatemail').focusout(function () {
        let register_email = $('#fos_user_registration_form_email').val()
        let register_emailrepeat = $('#repeatemail').val()
        $('#matchemail').hide()
        if (register_email.localeCompare(register_emailrepeat) === 0) {
            registable = true
            console.log(registable)
            $('#matchemail').empty()
            $('#matchemail').fadeOut()
            console.log('okk')
            $('#register_button').attr('disabled', false)
        } else {
            registable = false
            $('#matchemail').empty()
            $('#matchemail').append('les deux emails doivent etre identiques')
            $('#matchemail').fadeIn()
            $('#register_button').attr('disabled', true)
        }
    })

    $('#fos_user_registration_form_email').focusout(function () {
        let register_email = $('#fos_user_registration_form_email').val()
        let register_emailrepeat = $('#repeatemail').val()
        $('#matchemail').hide()
        if (register_email.localeCompare(register_emailrepeat) === 0) {
            registable = true
            $('#matchemail').empty()
            $('#matchemail').fadeOut()
            $('#register_button').attr('disabled', false)
        } else {
            registable = false
            $('#matchemail').empty()
            $('#matchemail').append('les deux emails doivent être identiques')
            $('#matchemail').fadeIn()
            $('#register_button').attr('disabled', true)
        }
    })


    $('#fos_user_registration_form_numberid').focusout(function () {
        var taille = $('#fos_user_registration_form_numberid').val().length
        var valeur = $('#fos_user_registration_form_numberid').val()

        switch (taille) {
            case 13:
                var i;
                for (i = 0; i < 13; i++) {
                    var nb = parseInt(valeur[i])
                    if (isNaN(nb)) {
                        if (i !== 1) {
                            $('#register_button').attr('disabled', true)
                            $('#matchIdCard').empty();
                            $('#matchIdCard').append('Le numero est invalide');
                            return;
                        }
                    }
                }
                $('#matchIdCard').empty();
                $('#register_button').attr('disabled', false)
                break;
            case 9:
                var i;
                for (i = 0; i < 9; i++) {
                    var nb = parseInt(valeur[i])
                    if (isNaN(nb)) {
                        if (i !== 0) {
                            $('#register_button').attr('disabled', true)
                            $('#matchIdCard').empty();
                            $('#matchIdCard').append('Le numero est invalide');
                            return;
                        }
                    }

                }
                $('#matchIdCard').empty();
                break;
            case 14:
            case 17:
                if (isNaN(valeur)) {
                    $('#register_button').attr('disabled', true)
                    $('#matchIdCard').empty();
                    $('#matchIdCard').append('Le numero est invalide');
                    return;
                }
                $('#matchIdCard').empty();
            default:
                $('#matchIdCard').empty();
                $('#matchIdCard').append('Le numero est invalide');

        }
    })


    $('#naissloader').hide();
    $('#residloader').hide();
    $('#emploi1loader').hide();
    $('#emploi2loader').hide();
});

