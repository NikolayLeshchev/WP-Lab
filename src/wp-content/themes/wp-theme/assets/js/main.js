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