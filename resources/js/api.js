class Api {
    constructor () {
    }

    call (requestType, url, data = null) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, data)
                .then(response => {
                    resolve(response);
                })
                .catch(({response}) => {
                    if (response.status === 401) {
                        auth.logout();
                        window.location.href ='/';
                        alert('Не авторизован');
                    }

                    reject(response);
                });
        });
    }
}

export default Api;
