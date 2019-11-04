class Api {
    constructor () {
    }

    call (requestType, url, data = null) {
        return new Promise((resolve, reject) => {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + auth.token;
            axios[requestType](url, data)
                .then(response => {
                    resolve(response);
                })
                .catch(({response}) => {
                    if (response.status === 401) {
                        auth.logout();
                    }

                    reject(response);
                });
        });
    }
}

export default Api;
