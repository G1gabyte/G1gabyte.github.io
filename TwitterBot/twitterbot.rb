#!/usr/bin/env ruby

require 'twitter'

client = Twitter::REST::Client.new do |config|
  config.consumer_key        = "xpzzdueDxolhdciAqdTHYgcgf"
  config.consumer_secret     = "vnMLl3s7w97I9DgcrsVGLnb6DBUva7cK2rTFqApnGMddOaNqTk"
  config.access_token        = "66189574-mvldfyAqS8L2qTZCYEbVDGGDzKyzwCWSGg1NMsHCb"
  config.access_token_secret = "Kxl8ly1eaUoIybcH1vI0Ttas9RBZSw35as0Lrx8Q0AoZR"
end


outputs = ["A smart man makes a mistake, learns from it, and never makes that mistake again. But a wise man finds a smart man and learns from him how to avoid the mistake altogether.", "The end is near!", "Are you ready?", "Live for yourself.", "The winter is coming", "The trouble is you think you have time.", "So it goes.", "Whatever you are, be a good one.", "Everone dies, but not everyone lives"]
client.update(outputs.sample)
