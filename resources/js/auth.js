class Auth {
    constructor() {
        this.token = window.localStorage.getItem('token');

        let userData = window.localStorage.getItem('user');
        this.user = userData ? JSON.parse(userData) : { user: {name: '', surname: '', user_image: ''}};

        if (this.token) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;
        }
    }

    login (token, user) {
        window.localStorage.setItem('token', token);
        window.localStorage.setItem('user', JSON.stringify(user));

        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

        this.token = token;
        this.user = user;

        Event.$emit('userLoggedIn');
    }

    check () {
        return !!this.token && this.token !== 'null';
    }

    logout() {
        let data = {
            token: window.localStorage.getItem('token')
        };
        axios.post('/api/logout', data)
            .then(({data}) => {
                window.localStorage.setItem('token', '');
                window.localStorage.setItem('user', '');
                this.token = '';
                this.user = '';
                Event.$emit('userLoggedOut');
            })
            .catch(({response}) => {
                alert(response.data.message);
            });
    }
}

export default Auth;
