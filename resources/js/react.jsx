import React from 'react';
import ReactDOM from 'react-dom/client';
import ToastProvider from './components/ToastProvider'
import { toast } from 'react-hot-toast';
import 'iconify-icon';

const message = document.getElementById('toast-message')?.dataset.message;
const type = document.getElementById('toast-message')?.dataset.type;
if (message && type =='success') toast.success(message);
if (message && type =='error') toast.error(message);

ReactDOM.createRoot(document.getElementById('toast-root')).render(
  <React.StrictMode>
    <ToastProvider />
  </React.StrictMode>
);

window.notify = {
  success: (msg) => toast.success(msg),
  error: (msg) => toast.error(msg),
  warning: msg => toast(msg,
        {
          icon: '⚠️',
          style: {
            borderRadius: '10px',
            background: '#333',
            color: '#fff',
          },
        }
    )
};
