// ローディング画面実装
const keyName = 'visited';
const keyValue = true;

if (!sessionStorage.getItem(keyName)) {
    //sessionStorageにキーと値を追加
    sessionStorage.setItem(keyName, keyValue);

    //ここに初回アクセス時の処理
    window.setTimeout(function(){
        document.getElementById('loading').style.display = "none";
    }, 3700);
    } else {
    //ここに通常アクセス時の処理
    document.getElementById('loading').style.display = "none";
}

//モーダルの表示非表示
class Modal {
    constructor(buttonId, modalId, backgroundModal) {
        this.button = document.getElementById(buttonId); //ボタン
        this.modal = document.getElementById(modalId); //出てくるモーダル 
        this.modalBack = document.getElementById(backgroundModal); //バックグラウンド
    };

        //モーダルコンテンツの表示
        getModal() {this.button.addEventListener('click', ()=>{
            this.modal.classList.add("active");
            this.modalBack.style.display = "block";
        });
    };
    
    //モーダルコンテンツ以外がクリックされた時
    outModal() {this.modalBack.addEventListener('click', ()=>{
        this.modal.classList.remove("active");
        this.modalBack.style.display = "none";
    });
};
};

const search = new Modal('js-search', 'js-search-modal', 'js-modal-background');
const up = new Modal('js-up', 'js-up-modal', 'js-modal-background');
const introduction = new Modal('js-introduction', 'js-introduction-modal', 'js-modal-background');

try{  
    //エラー出るかもしれないけど実行したい処理  
    up.getModal();
    up.outModal();
    }catch(e){  
    //エラーが出たときの処理  
    }finally{  
    //必ず実行される処理  
    search.getModal();
    search.outModal();
    introduction.getModal();
    introduction.outModal();
};  


