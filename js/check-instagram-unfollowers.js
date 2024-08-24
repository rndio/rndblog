document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById('check-ig-unfollowers');

  const resultFollowers = document.getElementById('result-followers');
  const resultFollowing = document.getElementById('result-following');
  const resultUnfollowers = document.getElementById('result-unfollowers');

  const countFollowers = document.getElementById('count-followers');
  const countFollowing = document.getElementById('count-following');
  const countUnfollowers = document.getElementById('count-unfollowers');

  const modalResultEl = document.getElementById('modalResult');
  const modalResult = new bootstrap.Modal(modalResultEl);

  function createElement(data){
    const card = document.createElement('div');
    card.classList.add('card', 'card-body', 'border-0', 'mb-1');

    const dFlex = document.createElement('div');
    dFlex.classList.add('d-flex', 'gap-3', 'align-items-center');

    const icon = document.createElement('i');
    icon.classList.add('ri-user-3-line', 'ri-2x');

    const div = document.createElement('div');

    const a = document.createElement('a');
    a.href = `https://instagram.com/${data.username}`;
    a.target = '_blank';
    a.classList.add('text-decoration-none');

    const h6 = document.createElement('h6');
    h6.classList.add('fw-semibold');
    h6.textContent = data.username;

    const small = document.createElement('small');
    small.textContent = `${data.followedOn}`;

    a.appendChild(h6);
    div.appendChild(a);
    div.appendChild(small);
    dFlex.appendChild(icon);
    dFlex.appendChild(div);
    card.appendChild(dFlex);

    return card;
  }

  function parsingFollowers(followers){
    const parsedData = followers.map(follower => {
      const data = follower.string_list_data[0];
      return {
        username: data.value,
        followedOn: new Date(data.timestamp * 1000).toLocaleString()
      }
    });

    return parsedData;
  }

  function parsingFollowing(following){
    const parsedData = following.relationships_following.map(following => {
      const data = following.string_list_data[0];
      return {
        username: data.value,
        followedOn: new Date(data.timestamp * 1000).toLocaleString()
      }
    });

    return parsedData;
  }

  function checkUnfollowers(followers, following){
    const unfollowers = following.filter(following => {
      return !followers.some(follower => follower.username === following.username);
    });

    return unfollowers;
  }

  function checkFollowers(followers, following){
    // check my followers that not in following
    const myFollowers = followers.filter(follower => {
      return !following.some(following => following.username === follower.username);
    });

    return myFollowers;
  }


  form.addEventListener('submit', function (e) {
    e.preventDefault();
    const followersJson = document.getElementById('followers-json').files[0];
    const followingJson = document.getElementById('following-json').files[0];

    let followers = [];
    let following = [];
    let unfollowers = [];

    const followersReader = new FileReader();
    followersReader.readAsText(followersJson);
    followersReader.onload = function () {
      const data = JSON.parse(followersReader.result);
      followers = parsingFollowers(data);
    }

    const followingReader = new FileReader();
    followingReader.readAsText(followingJson);
    followingReader.onload = function () {
      const data = JSON.parse(followingReader.result);
      following = parsingFollowing(data);
    }

    followersReader.onloadend = followingReader.onloadend = function () {
      unfollowers = checkUnfollowers(followers, following);
      countUnfollowers.textContent = `(${unfollowers.length})`;
      resultUnfollowers.innerHTML = '';
      unfollowers.forEach(unfollower => {
        resultUnfollowers.appendChild(createElement(unfollower));
      });

      followers = checkFollowers(followers, following);
      countFollowers.textContent = `(${followers.length})`;
      resultFollowers.innerHTML = '';
      followers.forEach(follower => {
        resultFollowers.appendChild(createElement(follower));
      });
    };

    modalResult.show();
  });
});