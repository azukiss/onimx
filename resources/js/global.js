import './bootstrap';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import Ripple from "@wilkr/alpine-ripple";

Alpine.plugin(collapse);
Alpine.plugin(Ripple);

window.Alpine = Alpine;
Alpine.start();
