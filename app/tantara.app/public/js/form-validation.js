// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"

    //register
    $("form[name='registration']").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        nom: {
            required: true,
            minlength: 3
        },
        username: {
            required: true,
            minlength: 5
        },

        // email: {
        //   required: true,
        //   // Specify that email should be validated
        //   // by the built-in "email" rule
        //   email: true
        // },
        password: {
          required: true,
          minlength: 5
        },
        confirm:"required"
      },
      // Specify validation error messages
      messages: {
        nom: {
            required: "Entrer votre nom",
            minlength: "Votre nom doit contenir au moin 3 caracteres"
          },
        username: {
            required: "Specifier votre pseudo",
            minlength: "Votre nom doit contenir au moin 5 caracteres"
          },
        password: {
          required: "Utiliser un mot de passe",
          minlength: "Votre mot de passe doit contenir au moin 5 caracteres"
        },
        confirm: "Confirmer votre mot de passe"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });



    //login
    $("form[name='login']").validate({
        // Specify validation rules
        rules: {
          // The key name on the left side is the name attribute
          // of an input field. Validation rules are defined
          // on the right side
          username:"required",
          password:"required"
        },
        // Specify validation error messages
        messages: {
          username:"Entrer votre username",
          password:"Entrer votre mot de passe"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
          form.submit();
        }
      });


    //add-post
    $("form[name='add_post']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            titre:"required",
            contenu:"required"
        },
        // Specify validation error messages
        messages: {
            titre:"Entrer un titre",
            contenu:"Entrer le contenu de votre tantara"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
          form.submit();
        }
      });

    //add-category
    $("form[name='add_category']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            titre:"required"
        },
        // Specify validation error messages
        messages: {
            titre:"Entrer un titre pour la categorie"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
          form.submit();
        }
      });
    $("form[name='edit_category']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            titre:"required"
        },
        // Specify validation error messages
        messages: {
            titre:"Entrer un titre pour la categorie"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
          form.submit();
        }
      });
    
      
  });
  