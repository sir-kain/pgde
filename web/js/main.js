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