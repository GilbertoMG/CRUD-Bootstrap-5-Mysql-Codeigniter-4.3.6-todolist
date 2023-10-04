class Main {
    "use strict";
    url = '';
    bodyElement = document.body;
    divList = null;
    divPagination = null;
    _data = 'data=1';

    constructor(domElementId = null) {
        this.baseURL = this.getAttributeOfElement(this.bodyElement, 'data-url');
        if (domElementId !== null) this.divList = this.getById(domElementId);
    }

    setData(_data) {
        this.data = _data;
    }

    setURL(url) {
        this.url = url;
    }

    getById(id) {
        return document.getElementById(id);
    }

    getAttributeOfElement(element, attribute) {
        return element.getAttribute(attribute);
    }
    //---------------------

    // Função auxiliar
    auxiliar(httpRequest, callback) {

        httpRequest.onreadystatechange = function () {

            if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                console.log('httpRequest.responseURL', httpRequest.responseURL);
                console.log('responseText', httpRequest.responseText.substring(0, 15));

                if (
                    httpRequest.responseURL == 'http://localhost/curso-ci4/curso-todo/public/auth'
                ) {

                    window.location.reload();
                } else {
                    callback(httpRequest.responseText);
                }
            }

            if (httpRequest.readyState === 4 && (httpRequest.status == 404 || httpRequest.status == 500)) {
                console.log(httpRequest.responseURL);
            }
        };
    }

    async fetchPost() {

        try {
            console.log('no fetch', this.url);
            const response = await fetch(this.url, {
                method: 'POST',
                body: JSON.stringify({
                    order_by: 'desc',
                    status: 2,

                }),
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            console.log(JSON.stringify({
                title: 'title',
                body: 'body',

            }));
            const data = await response.json();

            if (!response.ok) {
                return {
                    error: true,
                    code: data.code,
                    message: data.message
                };
            }

            return data;

        } catch (err) {
            console.log(err);
        }


        /*
                try {
                    const response = await fetch(this.url, {
                        method: 'POST',
                        body: JSON.stringify({
                            title: 'title',
                            body: 'body',
        
                        }),
                        headers: {
                            'Content-type': 'application/json; charset=UTF-8',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }).then((res) => res.json());
                   
                    if (!response.ok) {
                        return {
                            error:true,
                            code: response.code,
                            message: response.message
                        };
                    }
                    return response;
                } catch (err) {
                    console.log(new Error(err));
                    
                }
        
        */
    }

    //----------------------------------------------
    postDataAjax(callback) {


        var httpRequest = this.getInstance();

        this.auxiliar(httpRequest, callback);

        httpRequest.open('POST', this.url, true);
        httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        httpRequest.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        httpRequest.send(this._data);

    }

    getInstance() {

        var httpRequest;

        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            httpRequest = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // IE
            try {
                httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    alert('Ocorreu um erro desconhecido...');
                }
            }
        }

        if (!httpRequest) {
            alert('Não foi possível criar instancia XMLHTTP');
            window.location.reload();
            return false;
        }

        return httpRequest;

    }

    renderTable(json) {
        if (!json) {
            return;
        }

        if (document.getElementById('pagination')) {
            document.getElementById('pagination').remove();
        }

        this.divPagination = document.createElement('div');
        this.divPagination.id = 'pagination';
        this.divPagination.innerHTML = json.pagination;
        var elementoPai = this.divList.parentNode;

        elementoPai.insertBefore(this.divPagination, this.divList);

        this.pagination();


        const header = json.header;
        const data = json.data;
        console.log(header);
        this.divList.innerHTML = header;

        let htmlHeader = '<table class="table"><tr>';
        this.divList.innerHTML = header;

        for (const i in header) {
            htmlHeader += '<th class="text-center fw-bolder">' + header[i].name + '</th>';
        }

        htmlHeader += '<th>actions</th>';

        htmlHeader += '</tr>';

        data.forEach((element, i) => {

            htmlHeader += '<tr>';

            for (const i2 in header) {

                htmlHeader += '<td class="' + header[i2].class + '">' + element[i2] + '</td>';
            }

            htmlHeader += '<td class="">';
            for (const i2 in json.actions) {

                htmlHeader += '<a>' + i2 + element['id'] + '</a>';
            }
            htmlHeader += '</td>';

            htmlHeader += '</tr>';
        });

        htmlHeader += '</table>';
        this.divList.innerHTML = htmlHeader;
        console.log(Array.from(header));
    }

    flashMessage(obj) {
        this.divList.innerHTML = '<div class="' + obj.class + '">' + obj.message + '</div>';
    }

    async getDataTable() {

        const results = await this.fetchPost();

        if (results.error) {
            this.flashMessage({
                class: 'alert alert-danger',
                message: 'Code: ' + results.code + ',  message: ' + results.message
            });
            return;
        }

        this.renderTable(results);

    }

    pagination() {
        usuario.divPagination.addEventListener('click', function (e) {
            e.preventDefault();

            if (e.target.nodeName === 'A') {
                usuario.setURL(e.target.getAttribute('href'));
                usuario.getDataTable(e.target.getAttribute('href'));
            }

        });

    }


}