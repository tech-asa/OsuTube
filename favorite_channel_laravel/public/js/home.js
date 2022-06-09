// ローディング画面実装
const keyName = 'visited';
const keyValue = true;

if (!sessionStorage.getItem(keyName)) {
    //sessionStorageにキーと値を追加
    sessionStorage.setItem(keyName, keyValue);

    //ここに初回アクセス時の処理
    window.setTimeout(function(){
        document.getElementById('loading').style.display = "none";
    }, 3500);
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
    })};
    
    //モーダルコンテンツ以外がクリックされた時
    outModal() {this.modalBack.addEventListener('click', ()=>{
        this.modal.classList.remove("active");
        this.modalBack.style.display = "none";
    })};
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

// レスポンシブデザイン：フェードイン
    let fadeConts = document.querySelectorAll('.fadeConts'); // フェードさせる要素の取得
    let fadeContsRect = []; // 要素の位置を取得するための配列
    let fadeContsTop = []; // 要素の位置を取得するための配列
    let windowY = window.pageYOffset; // ウィンドウのスクロール位置
    let windowH = window.innerHeight; // ウィンドウの高さ
    let remainder = 100; // ちょっとはみ出させる部分

    // 要素の位置を取得
    for (let i = 0; i < fadeConts.length; i++) {
    fadeContsRect.push(fadeConts[i].getBoundingClientRect());
    }
    for (let i = 0; i < fadeContsRect.length; i++) {
    fadeContsTop.push(fadeContsRect[i].top + windowY);
    }

    // ウィンドウがリサイズされたら、ウィンドウの高さを再取得
    window.addEventListener('resize', function () {
    windowH = window.innerHeight;
    });

    // ロードされたら(scrollに変更可能)
    window.addEventListener('load', function () {
    // スクロール位置を取得
    windowY = window.pageYOffset;
    
    for (let i = 0; i < fadeConts.length; i++) {
        // 要素が画面の下端にかかったら
        if(windowY > fadeContsTop[i] - windowH + remainder) {
        // .showを付与
        fadeConts[i].classList.add('show');
        } else {
        // 逆に.showを削除
        fadeConts[i].classList.remove('show');
        }
    }
    });

