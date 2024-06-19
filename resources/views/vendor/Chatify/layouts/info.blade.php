{{-- user info and avatar --}}
<div><svg xmlns="http://www.w3.org/2000/svg" width="40%" height="12%" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="background-color: white;">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
</div>
<p class="info-name">{{ config('chatify.name') }}</p>
<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation">Delete Conversation</a>
</div>
<!--{{-- shared photos --}}-->
<!--<div class="messenger-infoView-shared">-->
<!--    <p class="messenger-title"><span>Shared Photos</span></p>-->
<!--    <div class="shared-photos-list"></div>-->
<!--</div>-->

