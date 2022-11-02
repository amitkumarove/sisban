var player;

function playVideo(event) {

  let playerEl = event.currentTarget.getElementsByClassName('media-frame__player__plyr');
  let imageEl = event.currentTarget.getElementsByClassName('media-frame__poster__image');
  let embedHtml = "";

  // Embed HTML player
  let platform = playerEl[0].dataset.platform;
  if (platform === 'embed') {
    embedHtml = playerEl[0].dataset.videoCode
  } else {
    let videoId = playerEl[0].dataset.videoCode; // This is the unique ID from the platform

    if (platform === 'youtube') {
      embedHtml = "<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/" + videoId + "\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>"
    } else if (platform === 'vimeo') {
      embedHtml = "<iframe src=\"https://player.vimeo.com/video/" + videoId + "\" width=\"100%\" height=\"100%\" frameborder=\"0\" allow=\"autoplay; fullscreen\" allowfullscreen></iframe>";
    } else if (platform === 'image') {
      embedHtml = imageEl[0].innerHTML;
    }
  }

  let opts = {
    className: 'media-frame__player__plyr__lightbox lightbox'
  }
  const instance = basicLightbox.create(embedHtml, opts)
  instance.show()
}
