<template>
  <!-- @click="modalOpen = !modalOpen" -->
  <a
    class="inline-flex"
    href="https://github.com/AlexVipond/jigsaw-vue-tailwind-preset#readme"
    target="_blank"
    rel="noopener">
    <svg
      v-if="showIconBeforeMessage"
      class="inline-block h-4 w-4 mr-2 stroke-current"
      xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
      fill="none"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round">
      <polyline points="16 18 22 12 16 6"></polyline>
      <polyline points="8 6 2 12 8 18"></polyline>
    </svg>

    <span>{{ messages[language].call_to_action }}</span>

    <svg
      v-if="showIconAfterMessage"
      class="inline-block h-4 w-4 ml-2 stroke-current"
      xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
      fill="none"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round">
      <polyline points="16 18 22 12 16 6"></polyline>
      <polyline points="8 6 2 12 8 18"></polyline>
    </svg>

    <!-- <portal to="modals">
      <modal-background z-index="z-40" :open="modalOpen" @close="modalOpen = false">
        <contact-form :language="language" :open="modalOpen" @close="modalOpen = false"></contact-form>
      </modal-background>
    </portal> -->
  </a>
</template>

<script>
// import ModalBackground from '../components/ModalBackground.vue'

export default {
  components: {
    // ModalBackground,
  },
  props: {
    language: {
      type: String,
      required: true
    },
    messagesReplacement: {
      type: Object,
    },
    firstLetterIsUpperCase: {
      type: Boolean,
    },
    showIconBeforeMessage: {
      type: Boolean,
      default: false
    },
    showIconAfterMessage: {
      type: Boolean,
      default: false
    },
  },
  data () {
    return {
      messages: {
        en: {
          call_to_action: 'View source code'
        },
        es: {
          call_to_action: 'Ver código'
        }
      }
    }
  },
  methods: {
    upperCaseFirstLetter (str) {
      return str[0].toUpperCase() + str.slice(1)
    },
    lowerCaseFirstLetter (str) {
      return str[0].toLowerCase() + str.slice(1)
    },
    replaceMessages(messagesReplacement) {
      this.messages = messagesReplacement
    }
  },
  created () {
    // replace message
    if(this.messagesReplacement) {
      this.replaceMessages(this.messagesReplacement)
    }

    // uppercase message
    var language, message
    if(this.firstLetterIsUpperCase) {
      for (language in this.messages) {
        for (message in this.messages[language]) {
          this.messages[language][message] = this.upperCaseFirstLetter(this.messages[language][message])
        }
      }
    } else {
      for (language in this.messages) {
        for (message in this.messages[language]) {
          this.messages[language][message] = this.lowerCaseFirstLetter(this.messages[language][message])
        }
      }
    }
  }
}
</script>
