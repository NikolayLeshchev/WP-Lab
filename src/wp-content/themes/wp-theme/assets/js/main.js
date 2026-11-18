async function showPostsTitles () {
    const response = await fetch('/wp-json/wp/v2/posts?_fields=title.rendered');
    const posts = await response.json();
  
    const container = document.getElementById('posts-list');
    posts.forEach(post=>{
      const p = document.createElement('p');
      p.textContent = post.title.rendered;
      container.appendChild(p);
    })
} 

//showPostsTitles();


async function loadPosts() {
  try{
    const response = await fetch('/wp-json/wp/v2/posts?per_page=3&orderby=title&_fields=id,title')
    const results = await response.json();
    results.forEach(el => {
      console.log(el.title.rendered)
    })

  } catch (error) {
    console.log(error);
  }
}

//loadPosts()

async function createDraftPost () {
  try {
    const response = await fetch('/wp-json/wp/v2/pages', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-WP-Nonce': wpApiSettings.nonce
      },
      body: JSON.stringify({
        title: 'New Draft Page',
        content: 'This is the content of the new draft page.',
        status: 'publish'
      }),
      credentials: 'same-origin'
    });

    const result = await response.json();
    console.log(result);

  } catch (error) {
    console.log(error);
  }
}

//createDraftPost()

async function searchAndShowPosts(searchTerm) {
  try {
    const response = await fetch(`/wp-json/wp/v2/posts?search=${searchTerm}&per_page=5&_fields=id,title,link`);
    const container = document.getElementById('posts-list');
    container.innerHTML = '';

    if(response.ok){
      const results = await response.json();
      if(results.length > 0){
        results.forEach(post => {
          container.innerHTML += `<p><a href="${post.link}">${post.title.rendered}</a></p>`;
        })
      }


      else{
        container.innerHTML = '<p>Ничего не найдено</p>';
      }
      
    }
  } catch (error) {
    console.log(error);
  }
}

//searchAndShowPosts('now');


async function showPostsCount() {
  try {
    const response = await fetch('/wp-json/wp-theme/v1/posts-count', {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
        'X-WP-Nonce': wpApiSettings.nonce
      },
      credentials: 'same-origin'
      });
    const result = await response.json();
    console.log('Опубликованных постов: ' + result.count);

  } catch (error) {
    console.log(error);
  }
} 

showPostsCount()


async function updatePostTitle(postId, newTitle) {
  try {
    const response = await fetch(`/wp-json/wp/v2/posts/${postId}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-WP-Nonce': wpApiSettings.nonce
      },
      body: JSON.stringify({
        title: newTitle
      }),
      credentials: 'same-origin'
    });

    const result = await response.json();
    console.log(result);

  } catch(error) {
    console.log(error);
  }
}

//updatePostTitle(6, 'Updated Title 6');


async function deletePost(postId) {
  try {
    const response = await fetch(`/wp-json/wp/v2/posts/${postId}?force=true`, {
      method : 'DELETE',
      headers: {
        'Content-Type': 'application/json',
        'X-WP-Nonce': wpApiSettings.nonce
      },
      credentials : 'same-origin'
    });

    const result = await response.json();
    console.log(result);

  } catch(error) {
    console.log(error);
  }
}

//deletePost(1);