    let config = {

            'korisnicko_ime': {
                required: true,
                minLength: 5,
                maxLength: 50
            },
            'email': {
                required: true,
                email: true,
                minLength: 5,
                maxLength: 50
            },

            'lozinka': {
                required: true,
                minLength: 5,
                maxLength: 30,
                matching: 'ponovi_lozinku'
            },
            'ponovi_lozinku': {
                required: true,
                minLength: 5,
                maxLength: 30,
                matching: 'lozinka'
            }

        }
        // console.log(config);


    let validator = new Validator(config, `#regForm`);

    let posalji_reg = document.getElementsByName("posalji-reg");
    /*
        document.querySelector("#regForm").addEventListener('submit', e => {
            e.preventDefault();

        });*/