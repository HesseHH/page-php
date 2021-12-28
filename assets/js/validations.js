

const loginBtn = document.getElementById('login');

loginBtn.addEventListener('click', e => {
    console.log('object');
    const email = document.getElementById('email').value;
    const passwd = document.getElementById('password').value;
    
    if( !( email === '' ) || !( passwd === '' ) ){
        const formData = new FormData();

        formData.append( 'email', email );
        formData.append( 'password', passwd );
        
        const request = new XMLHttpRequest();
        request.open( 'POST', '../../controllers/login.controller.php', true );
        request.onreadystatechange = function(e) {
            if ( request.readyState == 4 ) {
                if ( request.status == 200 ) {
                    if ( !(request.responseText === 'error_login') ) {
                        // alert(request.responseText);
                        window.location.href = request.responseText;
                    }else {
                        alert('Wrong credentials');
                        console.log('fallascascaso');
                    }
                }
            }
        }
        request.send(formData);
    }else {
        alert('Fill in all fields');
    }
})