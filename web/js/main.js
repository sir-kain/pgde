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
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            data: data,
            success: function (html) {
                console.log(html)
                // Replace current position field ...
                $(target).replaceWith(
                    // ... with the returned one from the AJAX response.
                    $(html).find(target)
                );
                // Position field now displays the appropriate positions.
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
        $.post($form.attr('action'), data).then(function (data) {
            // On récupère le nouveau <select>
            let $input = $(data).find(target);
            // On remplace notre <select> actuel
            $(target).replaceWith($input)
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
        $.post($form.attr('action'), data).then(function (data) {
            // On récupère le nouveau <select>
            let $input = $(data).find(target);
            // On remplace notre <select> actuel
            $(target).replaceWith($input)
        })
    });


$(document).on('change', '#pgde_emploibundle_userdata_boolhandicap, #pgde_emploibundle_userdata_handicapcategorie',
    function () {
        let $field = $(this)
        let $regionField = $('#pgde_emploibundle_userdata_boolhadicap')
        let $form = $field.closest('form')
        let target = '#' + $field.attr('id').replace('handicapcategorie', 'handicap').replace('boolhandicap', 'handicapcategorie')
        // Les données à envoyer en Ajax
        let data = {}
        data[$regionField.attr('name')] = $regionField.val()
        data[$field.attr('name')] = $field.val()
        // On soumet les données
        $.post($form.attr('action'), data).then(function (data) {
            console.log(data);
            // On récupère le nouveau <select>
            let $input = $(data).find(target)
            // On remplace notre <select> actuel
            $(target).replaceWith($input)
        })
    })

// $(document).on('change', '#pgde_emploibundle_userdata_boolhadicap',
//     function () {
//         let $field = $(this);
//         // let $regionField = $('#pgde_emploibundle_userdata_boolhadicap')
//         let $form = $field.closest('form');
//         let target = '#pgde_emploibundle_userdata_handicapcategorie';
//         // Les données à envoyer en Ajax
//         let data = {};
//         // data[$regionField.attr('name')] = $regionField.val()
//         data[$field.attr('name')] = $field.val();
//         // On soumet les données
//         $.ajax({
//             url: $form.attr('action'),
//             type: $form.attr('method'),
//             data: data,
//             success: function (html) {
//                 console.log(html)
//                 // Replace current position field ...
//                 $(target).replaceWith(
//                     // ... with the returned one from the AJAX response.
//                     $(html).find(target)
//                 );
//                 // Position field now displays the appropriate positions.
//             }
//         });
//     }
// );


$('#gritter-image').click( function() {
    $.gritter.add({
        title: 'Jane Doe',
        text: 'Online',
        image: 'assets/img/user3.png',
        time: 2000,
        after_close: function() {
            $.gritter.add({
                title: 'Jordan Smith',
                text: 'Offline',
                image: 'assets/img/user5.png',
                time: 2000
            });

            if( $('#gritter-sound-switch').is(':checked') ) {
                offlineSound.play();
            }
        }
    });
});

$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

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
            if (elementSectionForGitterAfterRessetingPassword.hasClass('gritter')){
                $.gritter.add({
                    title: username,
                    text: messagetext,
                    image: urlavatar,
                    time: 5000,
                });
            }
        }
    });


});

