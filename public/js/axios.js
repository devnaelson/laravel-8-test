export function config(url) {
    return axios.create({
        baseURL: url,
        timeout: 1000,
        //headers: {'X-Custom-Header': 'foobar'}
    });
}
export function request(axiosInst, url) {
    return axiosInst.get(url).then((response) => {
        return response.data;
    });
}